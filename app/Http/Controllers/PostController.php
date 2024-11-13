<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use App\Models\Talk;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function blog(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $settings = Setting::find(1);
        $blogs = Post::latest()->paginate(7);
        return view('pages.posts', with(['blogs'=>$blogs, 'settings' => $settings]));
    }

    public function talk(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $settings = Setting::find(1);
        $talks = Talk::latest()->paginate(7);

        return view('pages.talks', with(['talks'=>$talks, 'settings' => $settings]));
    }
    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $settings = Setting::find(1);

        $blog = Post::findOrFail($id);
        $isLiked = session()->has("liked_blog_{$id}");
        return view('pages.single-post', with(['blog'=>$blog,
            'settings' =>$settings,
            'isLiked' =>$isLiked
        ]));
    }

    public function toggleLike($id): \Illuminate\Http\RedirectResponse
    {
        $blog = Post::findOrFail($id);
        $sessionKey = "liked_blog_{$id}";

        if (session()->has($sessionKey)) {
            $blog->decrement('likes');
            session()->forget($sessionKey);
        } else {
            $blog->increment('likes');
            session()->put($sessionKey, true);
        }

        return redirect()->back();
    }



    public function main(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $settings = Setting::find(1);
        $a['facebook_url'] = $settings->facebook_url;
        $a['instagram_url'] = $settings->instagram_url;
        $a['linkedin_url'] = $settings->linkedin_url;
        $a['github_url'] = $settings->github_url;
        $a['twitter_url'] = $settings->twitter_url;
        $icons = [
            'facebook_url' => '
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M22.675 0h-21.35C0.593 0 0 0.593 0 1.325v21.351C0 23.407 0.593 24 1.325 24h11.495v-9.294H9.691v-3.622h3.129V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.466 0.099 2.798 0.143v3.24h-1.918c-1.504 0-1.795 0.715-1.795 1.763v2.312h3.587l-0.467 3.622h-3.12V24h6.116C23.407 24 24 23.407 24 22.675V1.325C24 0.593 23.407 0 22.675 0z"/>
                </svg>',
            'twitter_url' => '
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 4.557c-0.885 0.393-1.833 0.656-2.828 0.775 1.017-0.609 1.798-1.574 2.165-2.724-0.951 0.564-2.005 0.974-3.127 1.195-0.897-0.957-2.178-1.555-3.594-1.555-2.723 0-4.927 2.204-4.927 4.927 0 0.386 0.043 0.762 0.127 1.124-4.094-0.205-7.725-2.166-10.157-5.144-0.424 0.724-0.666 1.562-0.666 2.456 0 1.693 0.862 3.184 2.17 4.059-0.801-0.026-1.554-0.246-2.213-0.614v0.061c0 2.366 1.683 4.342 3.918 4.788-0.41 0.112-0.843 0.172-1.289 0.172-0.314 0-0.618-0.031-0.916-0.088 0.619 1.931 2.416 3.338 4.544 3.377-1.666 1.306-3.766 2.084-6.045 2.084-0.393 0-0.779-0.023-1.158-0.068 2.156 1.383 4.721 2.191 7.477 2.191 8.975 0 13.888-7.437 13.888-13.888 0-0.211-0.004-0.423-0.015-0.633 0.954-0.689 1.781-1.548 2.436-2.528z"/>
                </svg>',
            'instagram_url' => '
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584 0.012 4.85 0.07 1.366 0.062 2.633 0.35 3.608 1.325 0.975 0.975 1.263 2.242 1.325 3.608 0.058 1.266 0.07 1.646 0.07 4.85s-0.012 3.584-0.07 4.85c-0.062 1.366-0.35 2.633-1.325 3.608-0.975 0.975-2.242 1.263-3.608 1.325-1.266 0.058-1.646 0.07-4.85 0.07s-3.584-0.012-4.85-0.07c-1.366-0.062-2.633-0.35-3.608-1.325-0.975-0.975-1.263-2.242-1.325-3.608-0.058-1.266-0.07-1.646-0.07-4.85s0.012-3.584 0.07-4.85c0.062-1.366 0.35-2.633 1.325-3.608 0.975-0.975 2.242-1.263 3.608-1.325 1.266-0.058 1.646-0.07 4.85-0.07m0-2.163c-3.259 0-3.667 0.012-4.947 0.071-1.292 0.06-2.43 0.27-3.295 0.541-0.87 0.272-1.611 0.631-2.348 1.367-0.736 0.736-1.095 1.478-1.367 2.348-0.271 0.865-0.481 2.003-0.541 3.295-0.059 1.28-0.071 1.688-0.071 4.947s0.012 3.667 0.071 4.947c0.06 1.292 0.27 2.43 0.541 3.295 0.272 0.87 0.631 1.611 1.367 2.348 0.736 0.736 1.478 1.095 2.348 1.367 0.865 0.271 2.003 0.481 3.295 0.541 1.28 0.059 1.688 0.071 4.947 0.071s3.667-0.012 4.947-0.071c1.292-0.06 2.43-0.27 3.295-0.541 0.87-0.272 1.611-0.631 2.348-1.367 0.736-0.736 1.095-1.478 1.367-2.348 0.271-0.865 0.481-2.003 0.541-3.295 0.059-1.28 0.071-1.688 0.071-4.947s-0.012-3.667-0.071-4.947c-0.06-1.292-0.27-2.43-0.541-3.295-0.272-0.87-0.631-1.611-1.367-2.348-0.736-0.736-1.478-1.095-2.348-1.367-0.865-0.271-2.003-0.481-3.295-0.541-1.28-0.059-1.688-0.071-4.947-0.071z"/>
                    <circle cx="12" cy="12" r="3.6"/>
                </svg>',
            'github_url' => '
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0c-6.627 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387 0.599 0.111 0.793-0.261 0.793-0.577v-2.234c-3.338 0.726-4.033-1.416-4.033-1.416-0.546-1.387-1.333-1.756-1.333-1.756-1.089-0.745 0.083-0.729 0.083-0.729 1.205 0.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492 0.997 0.107-0.775 0.418-1.305 0.762-1.604-2.665-0.305-5.467-1.334-5.467-5.931 0-1.311 0.469-2.381 1.236-3.221-0.124-0.303-0.535-1.524 0.117-3.176 0 0 1.008-0.322 3.301 1.23 0.957-0.266 1.983-0.399 3.003-0.404 1.02 0.005 2.047 0.138 3.006 0.404 2.291-1.552 3.297-1.23 3.297-1.23 0.653 1.653 0.242 2.874 0.118 3.176 0.77 0.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921 0.43 0.372 0.823 1.102 0.823 2.222v3.293c0 0.319 0.192 0.694 0.801 0.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>',
            'linkedin_url' => '
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-0.966 0-1.75-0.79-1.75-1.764s0.784-1.764 1.75-1.764 1.75 0.79 1.75 1.764-0.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                </svg>',
        ];
        return view('pages.index', with(['settings'=>$settings, 'icons'=>$icons, 'links'=>$a]));

    }
    public function about_me(){
        $settings = Setting::find(1);
        return view('pages.about_me', with(['settings'=>$settings]));
    }
}


