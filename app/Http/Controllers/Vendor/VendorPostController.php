<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Requests\Vendor\FormPostRequest;
use App\Post;
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
        $posts = DB::table('posts')->get();
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
            $photoName = time() . '.' . $formPostRequest->image->getClientOriginalExtension();
            $formPostRequest->image->move(public_path('posts/images/'), $photoName);
            Post::create([
                'vendor_id' => $vendorId,
                'content' => $formPostRequest->get('content'),
                'image' => $photoName,
                'url' => $formPostRequest->get('url'),
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
        $post = Post::whereId($id)->findOrFail();

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
                $photoName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->image->move(public_path('posts/images/'), $photoName);
                $post = Post::whereId($id)->findOrFail();
                $post->image = $photoName;
                $post->content = $request->get('content');
                $post->url = $request->get('url');
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
    public function destroy($id)
    {
        //
        $post = Post::whereId($id)->findOrFail();
        $post->delete();

        return redirect('vendor/posts')->with('status', __('The Post ' . $id . ' has been deleted'));
    }
}
