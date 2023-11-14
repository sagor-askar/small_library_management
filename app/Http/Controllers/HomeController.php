<?php

namespace App\Http\Controllers;

use App\Models\Bookinfo;
use App\Models\BookRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Bookinfo::get();
        return view('home', compact('books'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $books = Bookinfo::get();
        return view('adminHome', compact('books'));
    }

    // create info
    public function create()
    {
        return view('bookinfo_create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_name' => 'required',
            'author' => 'required',
        ]);
        $newRecord = Bookinfo::create($validatedData);

        // Redirect to the home page or any other page as needed
        return redirect('admin/home')->with('success', 'Record created successfully');
    }

    public function createRequest()
    {
        // Fetch only available books
        $availableBooks = Bookinfo::where('status', 'Available')->pluck('book_name', 'id');

        return view('request', compact('availableBooks'));
    }

    public function storeRequest(Request $request)
    {

        // Validate the form data
        $request->validate([
            'book_info_id' => 'required|numeric',
            'student_name' => 'required|string',
            'requesting_date' => 'required|date',
            'return_date' => 'required|date',
        ]);


        // Create a new book request
        BookRequest::create($request->all());

        return redirect()->route('home')->with('success', 'Book request created successfully!');
    }

    // book request - admin panel
    public function checkRequest()
    {
        $check_requests = BookRequest::get();
        return view('check_request', compact('check_requests'));
    }

    // admin approval
    public function changeStatus($id)
    {
        $check_requests = BookRequest::find($id);

        if ($check_requests->status == "Pending") {
            $check_requests->status = "Approved";
            $check_requests->save();
            return redirect()->back();
        }
        if ($check_requests->status == "Approved") {
            $check_requests->status = "Pending";
            $check_requests->save();
            return redirect()->back();
        }
    }

    // edit book info
    public function editBookinfo($id)
    {
        $books = Bookinfo::find($id);
        return view('bookinfo_edit', compact('books'));
    }

    // update book info
    public function updateBookinfo(Request $request, $id)
    {
        $data =  $request->all();
        $books = Bookinfo::find($id);
        $books->update($data);
        return redirect()->route('admin.home')->with('message','Book Info Updated Successfully');

    }

    // delete book info - admin panel
    public function deleteBooks($id)
    {
        $books = Bookinfo::findOrFail($id);
        $books->delete();

        return redirect()->back();
    }

}
