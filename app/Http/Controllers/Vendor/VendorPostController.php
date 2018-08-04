<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Requests\Vendor\FormPostRequest;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->paginate(10);
        return view('vendors.posts.getPosts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendors.posts.createPost');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormPostRequest $formPostRequest)
    {
        //
        $vendorId = Auth::user()->id;
        try {
            Post::create([
                'vendor_id' => $vendorId,
                'content' => $formPostRequest->get('content'),
                'image' => $formPostRequest->get('image'),
            ]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('Has An Error!'));

        }
        return redirect('vendor/posts')->with('status', __('A Post has been created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::whereId($id)->firstOrFail();
        //
        return view('vendors.posts.createPost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormPostRequest $request, $id)
    {
        //
        if ($request->get('content') == null) {
            return redirect()->back()->with('error', __('Content Không thể Để Trống'));
        } else {
            try {
                $post = Post::Where('id', $id)->firstOrFail();
                $post->content = $request->get('content');
                $post->image = $request->get('image');
                $post->save();
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', __('Has error while update'));
            }
        }
        return redirect('vendor/posts')->with('status', __('Post had been Updated '));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(
        $id
    ) {
        //
        $post = Post::whereId($id)->firstOrFail();
        $post->delete();
        return redirect('vendor/posts')->with('status', 'The Post ' . $id . ' has been deleted');
    }
}
