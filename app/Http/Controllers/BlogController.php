<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Entag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $tags = Entag::all();
        return view('admin.blogs.enblogs.blogs.index', compact('blogs', 'tags'));
    }
    public function create()
    {
        $blog = new Blog();
        $tags = Entag::query()->pluck('nombre', 'id');
        return view('admin.blogs.enblogs.blogs.create', compact('blog', 'tags'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'resumen' => 'required',
            'descripcion' => 'required',
            'imgThumb' => 'required|image|max:2048',
            'imgBig' => 'required|image|max:2048',
            'keywords' => 'nullable',
            'tags' => 'nullable|array',
            'slug' => 'required|unique:blogs',
        ]);

        $imageNameThumb = $request->file('imgThumb')->getClientOriginalName();
        $request->file('imgThumb')->move(public_path('img/blogs/thumbs'), $imageNameThumb);

        $imageNameBig = $request->file('imgBig')->getClientOriginalName();
        $request->file('imgBig')->move(public_path('img/blogs/'), $imageNameBig);

        $blog = Blog::create([
            'nombre' => $request->nombre,
            'resumen' => $request->resumen,
            'descripcion' => $request->descripcion,
            'imgThumb' => $imageNameThumb,
            'imgBig' => $imageNameBig,
            'keywords' => $request->keywords,
            'slug' => $request->slug,
        ]);

        if ($request->tags) {
            $blog->tags()->sync($request->tags);
        }

        return redirect()->route('blogs.index')->with('success', 'Blog creado correctamente');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $tags = Tag::all();

        return view('admin.blogs.edit', compact('blog', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'resumen' => 'required',
            'descripcion' => 'required',
            'imgThumb' => 'nullable|image|max:2048',
            'imgBig' => 'nullable|image|max:2048',
            'keywords' => 'nullable',
            'tags' => 'nullable|array',
            'slug' => 'required|unique:blogs,slug,' . $id,
        ]);

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('imgThumb')) {
            $imageNameThumb = $request->file('imgThumb')->getClientOriginalName();
            $request->file('imgThumb')->move(public_path('img/blogs/thumbs'), $imageNameThumb);
            $blog->imgThumb = $imageNameThumb;
        }

        if ($request->hasFile('imgBig')) {
            $imageNameBig = $request->file('imgBig')->getClientOriginalName();
            $request->file('imgBig')->move(public_path('img/blogs/big'), $imageNameBig);
            $blog->imgBig = $imageNameBig;
        }

        $blog->nombre = $request->nombre;
        $blog->resumen = $request->resumen;
        $blog->descripcion = $request->descripcion;
        $blog->keywords = $request->keywords;
        $blog->slug = $request->slug;
        $blog->save();

        if ($request->tags) {
            $blog->tags()->sync($request->tags);
        } else {
            $blog->tags()->detach();
        }

        return redirect()->route('blogs.index')->with('success', 'Blog actualizado correctamente');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->tags()->detach();
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog eliminado correctamente');
    }


}