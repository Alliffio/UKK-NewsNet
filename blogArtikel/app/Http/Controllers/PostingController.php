<?php

namespace App\Http\Controllers;

use App\Posting;
use App\Category;
use App\Tags;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posting = Posting::paginate(10);
        return view('admin.posting.index', compact('posting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        $category = Category::all();
        return view('admin.posting.create', compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'isi' => 'required',
            'image' => 'required'

        ]);

        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();

        $posting = Posting::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'isi' => $request->isi,
            'image' => 'public/uploads/posting/'.$new_image,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id()
        ]);

        $posting->tags()->attach($request->tags);

        $image->move('public/uploads/posting/', $new_image);
        return redirect()->back()->with('success','Artikel berhasil disimpan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $tags = Tags::all();
        $posting = Posting::findorfail($id);
        return view('admin.posting.edit', compact('posting','tags','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'isi' => 'required'
        ]);

        $post = Posting::findorfail($id);

        if($request->has('image')) {
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('public/uploads/posting/', $new_image);

            $posting_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'isi' => $request->isi,
                'image' => 'public/uploads/posting/'.$new_image,
                'slug' => Str::slug($request->judul)
            ];
        }
        else{
            $posting_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'isi' => $request->isi,
                'slug' => Str::slug($request->judul)
            ];
        }

        $post->tags()->sync($request->tags);
        $post->update($posting_data);

        return redirect()->route('posting.index')->with('success','Artikel berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posting = Posting::findorfail($id);
        $posting->delete();

        return redirect()->back()->with('success','Artikel Berhasil di Hapus (Silahkan cek post trashed)');
        
    }

    public function tampil_delete()
    {
        $posting = Posting::onlyTrashed()->paginate(10);
        return view('admin.posting.delete', compact('posting'));
    }

    public function restore($id)
    {
        $posting = Posting::withTrashed()->where('id', $id)->first();
        $posting->restore();

        return redirect()->back()->with('success','Artikel Berhasil di restore (Silahkan cek di list post)');
    }

    public function kill($id)
    {
        $posting = Posting::withTrashed()->where('id', $id)->first();
        $posting->forceDelete();

        return redirect()->back()->with('success','Artikel Berhasil di Dihapus');
    }
}
