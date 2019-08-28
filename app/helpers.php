<?php

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

function forceRedirect(string $url)
{
    if (! request()->header('X-Inertia')) {
        return redirect($url);
    }

    return response('', SymfonyResponse::HTTP_CONFLICT)->header('x-inertia-location', $url);
}
