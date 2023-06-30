<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgeCategory;
use App\Models\Game;
use App\Models\Members;
use App\Models\MembershipFee;
use App\Models\MembershipType;
use App\Rules\AgeRange;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    //

    public function index()
    {
        $members = Members::latest()->filter(request(['search']))->paginate(2);
        foreach ($members as $member) {
            $dob = Carbon::parse($member->dob);
            $member->dob = $dob->age;
        }
        return view('members.index', ['members' => $members]);
    }

    public function create()
    {
        $membershiptype = MembershipType::all();
        $games = Game::all();
        return view('members.register', [
            'games' => $games,
            'membershiptypes' => $membershiptype,
        ]);
    }

    public function edit(Members $member)
    {
        $membershiptype = MembershipType::all();
        $games = Game::all();
        return view('members.edit', [
            'member' => $member,
            'membershiptypes' => $membershiptype,
            'games' => $games
        ]);
    }

    public function store(Request $request)
    {

        // Validate the form fields for the current page
        $data = $request->validate([
            'fullname' => 'required',
            'gender' => 'required',
            'nextofkin' => 'required',
            'dob' => ['required', 'date', new AgeRange(12, 35)],
            'contact' => ['required', 'regex:/^\+254\d{9}$/', Rule::unique('members', 'contact')],
            'subcounty' => 'required',
            'school' => 'required',
            'weight' => 'required | numeric',
            'height' => 'required | numeric',
            'specialneeds' => 'required',
            // Add validation rules for other fields
        ]);
        $enrolledas = $request->input('enrolledas');

        $data['membership_type_id'] = MembershipType::find($enrolledas)->id;
        $selectedGames = $request->input('games');
        $dob = Carbon::parse($request->dob);
        $age = $dob->age;

        if ($age >= 12 && $age <= 17) {
            $category = AgeCategory::find(1);
            $data['age_category_id'] = $category->id;
        } elseif ($age >= 18 && $age <= 25) {
            $category = AgeCategory::find(2);
            $data['age_category_id'] = $category->id;
        }
        if ($age >= 26 && $age <= 35) {
            $category = AgeCategory::find(2);
            $data['age_category_id'] = $category->id;
        }

        $member = Members::create($data);

        // Saving the membership fee
        $memberFee = new MembershipFee();
        $memberFee->member_id = $member->id;
        $memberFee->fee = MembershipType::find($enrolledas)->amount;

        $memberFee->save();

        // Saving the me$members games

        $member->games()->attach($selectedGames);

        return redirect('/members')->with('success', 'Member Registered Successfully!');
    }

    public function update(Request $request, Members $member)
    {
        $data = $request->validate([
            'fullname' => 'required',
            'gender' => 'required',
            'nextofkin' => 'required',
            'dob' => ['required', 'date', new AgeRange(12, 35)],
            'contact' => ['sometimes', 'regex:/^\+254\d{9}$/'],
            'subcounty' => 'required',
            'school' => 'required',
            'weight' => 'required | numeric',
            'height' => 'required | numeric',
            'specialneeds' => 'required',
            // Add validation rules for other fields
        ]);

        $enrolledas = $request->input('enrolledas');
        echo $enrolledas;

        $data['membership_type_id'] = MembershipType::find($enrolledas)->id;
        $selectedGames = $request->input('games');
        $dob = Carbon::parse($request->dob);
        $age = $dob->age;

        if ($age >= 12 && $age <= 17) {
            $category = AgeCategory::find(1);
            $data['age_category_id'] = $category->id;
        } elseif ($age >= 18 && $age <= 25) {
            $category = AgeCategory::find(2);
            $data['age_category_id'] = $category->id;
        }
        if ($age >= 26 && $age <= 35) {
            $category = AgeCategory::find(2);
            $data['age_category_id'] = $category->id;
        }

        // Updating Member FEE
        $memberFee = MembershipFee::where('member_id', $member->id)->firstOrFail();
        $memberFee->fee = MembershipType::find($enrolledas)->amount;
        $memberFee->save();

        //Updating Member 
        $member->update($data);
        //Updating Member_Games
        $member->games()->sync($selectedGames);

        return redirect('/members')->with('success', 'Member updated successfully!');
    }

    public function destroy(Members $member)
    {
        
        // Detach the associated games from the pivot table
        $member->games()->detach();

        // Delete the member
        $member->delete();



        return redirect('/members')->with('success', 'Member deleted successfully!');
    }
}
