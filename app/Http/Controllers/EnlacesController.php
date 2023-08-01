<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Destino;
use App\Models\Tours;
use App\Models\FooterText;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class EnlacesController extends Controller
{
    //Texto de pie de página:
    public function editFooterText()
    {
        $footerText = FooterText::first();
        return view('admin.foot.texto-foot', compact('footerText'));
    }

    public function updateFooterText(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $footerText = FooterText::first();
        if (!$footerText) {
            $footerText = new FooterText();
        }

        $footerText->text = $request->input('text');
        $footerText->save();

        return redirect()->route('edit.footer.text')->with('success', 'Texto del pie de página actualizado correctamente');
    }

    public function packages()
    {
        $tours = Tours::all();
        return view('peru-packages', compact('tours'));
    }
    public function adventures()
    {
        $tours = Tours::all();
        return view('peru-adventures', compact('tours'));
    }
    public function gastronomy()
    {
        $tours = Tours::all();
        return view('gastronomy', compact('tours'));
    }
    public function spiritual()
    {
        $tours = Tours::all();
        return view('spiritual', compact('tours'));
    }
    public function blogen()
    {
        $tours = Tours::all();
        $blogsHead = Blog::take(4)->get();
        $blogsIdsToSkip = Blog::latest()->take(2)->pluck('id');
        $blogs = Blog::with('tags')->latest()->take(2)->get();
        $blogsCards = Blog::with('tags')->whereNotIn('id', $blogsIdsToSkip)->latest()->get();
        return view('blog.index', compact('tours', 'blogs', 'blogsCards', 'blogsHead'));
    }
    public function destinies()
    {
        return view('destinies');
    }
}