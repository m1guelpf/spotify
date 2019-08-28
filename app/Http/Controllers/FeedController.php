<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Inertia\Inertia;
use App\Feed\Components\Alert;
use App\Feed\Components\Banner;
use App\Feed\Components\Activity;
use Facades\App\Feed\Builder as FeedBuilder;
use App\Feed\Components\CommentScroll;

class FeedController extends Controller
{
    public function index()
    {
        $users = User::all();

        $messages = collect([
            'just saved the <a href="#">Songmash</a> playlist to their library.',
            'just commented on <a href="#">High Hopes</a> by <a href="#">Panic! at the Disco</a>.',
            'just favorited <a href="#">A-Six</a> by <a href="#">Linkin Park</a>.',
            'just favorited <a href="#">Rush</a> by <a href="#">The Score</a>.',
            'just favorited <a href="#">in the dark</a> by <a href="#">Bring Me The Horizon</a>.',
            'just favorited <a href="#">Stars - Radio Edit</a> by <a href="#">Vicetone</a>.',
            'just favorited <a href="#">Leave Me Alone</a> by <a href="#">NF</a>.',
            'just favorited <a href="#">I Think I&apos;m OKAY</a> by <a href="#">Machine Gun Kelly</a> &amp; <a href="#">YUNGBLUD</a>.',
            'just favorited <a href="#">Everybody (Backstreet&apos;s Back)</a> by <a href="#">Backstreet Boys</a>.',
            'just favorited <a href="#">MZRY</a> by <a href="#">Crown The Empire</a>.',
            'just favorited <a href="#">Wolf in Sheep&apos;s Clothing</a> by <a href="#">Set It Off</a>.',
            'just favorited <a href="#">Comeback Kid</a> by <a href="#">New Politics</a>.',
            'just favorited <a href="#">Pure Gold</a> by <a href="#">half&bull;alive</a>.',
            'just favorited <a href="#">Panic Station</a> by <a href="#">Muse</a>.',
            'just favorited <a href="#">Part of Me</a> by <a href="#">Linkin Park</a>.',
            'just favorited <a href="#">Feeling So Fly</a> by <a href="#">TobyMac</a>.',
            'just favorited <a href="#">Style</a> by <a href="#">Foster The People</a>.',
            'just favorited <a href="#">Paid</a> by <a href="#">Chris Webby</a>.',
        ]);

        return Inertia::render('Feed')->with('feed', FeedBuilder::create(array_merge(
            // $users->random(5)->map(function ($user) use ($messages) {
            //     return Activity::create()->user($user)->message($messages->random());
            // })->toArray(),
            [CommentScroll::create()->comments(Comment::withoutSelf()->take(10)->get())],
            // $users->random(5)->map(function ($user) use ($messages) {
            //     return Activity::create()->user($user)->message($messages->random());
            // })->toArray(),
            [Banner::create()->image('https://i.scdn.co/image/a2d5caf95ea7319853924a019ff35bcf7dab123c')->album('Pray for the Wicked')->artist('Panic! at the Disco')],
            // $users->random(10)->map(function ($user) use ($messages) {
            //     return Activity::create()->user($user)->message($messages->random());
            // })->toArray(),
            [Alert::create()->href('#')->message('You haven&apos;t listened to your <a href="#">Cinematic Rap</a> playlist in a year. Ready to revisit old memories?')],
            // $users->random(5)->map(function ($user) use ($messages) {
            //     return Activity::create()->user($user)->message($messages->random());
            // })->toArray(),
            [Banner::create()->image('https://i.scdn.co/image/654173e97fe44927a71dda14032f3c5435adf5df')->album('The Search')->artist('NF')],
            // $users->random(5)->map(function ($user) use ($messages) {
            //     return Activity::create()->user($user)->message($messages->random());
            // })->toArray()
        )));
    }
}
