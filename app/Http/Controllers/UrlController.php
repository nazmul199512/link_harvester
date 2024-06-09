<?php

namespace App\Http\Controllers;

use App\Models\BaseDomain;
use App\Models\Url;
use Illuminate\Http\Request;
use App\Jobs\ProcessUrlJob;
use Illuminate\Support\Facades\Log;

class UrlController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Url::with('baseDomain:id,domain_name');

            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where('url', 'like', '%' . $search . '%');
            }

            $sortDirection = $request->input('sort_direction') ?? 'desc';

            $query->orderBy('created_at', $sortDirection);

            $urls = $query->paginate(10);

            $urls->appends($request->only('search', 'sort_field', 'sort_direction'));

            return view('urls.index', compact('urls'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->view('errors.500', [], 500);
        }
    }

    public function add()
    {
        return view('urls.add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'urls' => 'required|string',
            ]);
    
            $urlsString = str_replace("\\n", "\n", trim($request->input('urls')));
            $urls = explode("\n", $urlsString);
            foreach ($urls as $url) {
                ProcessUrlJob::dispatch($url);
            }
    
            return redirect()->route('urls.index')->with('success', 'URLs submitted successfully. Processing...');
        } catch (\Exception $e) {
            Log::error('Error occurred while processing URLs: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing the URLs. Please try again later.');
        }
    }
}
