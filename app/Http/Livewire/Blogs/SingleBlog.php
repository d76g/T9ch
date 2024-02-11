<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\Exception\ProcessFailedException;

class SingleBlog extends Component
{
    public $blog;

    public function mount($slug)
    {
        $this->blog = Blog::where('slug', '=', $slug)->first();
        if ($this->blog) {
             $this->callShiki($this->blog->content);  
        }
    }
    protected function callShiki(...$arguments): string
    {
        $cwd = './../vendor/spatie/shiki-php/bin';
    
    // Check if the cwd exists
        if (!$cwd) {
            throw new \Exception("The specified cwd does not exist: " . __DIR__ . '/../bin');
        }
        $command = [
            (new ExecutableFinder())->find('node', 'node', [
                '/usr/local/bin',
                '/opt/homebrew/bin',
            ]),
            'shiki.js',
            json_encode(array_values($arguments)),
        ];

        $process = new Process(
            command: $command,
            cwd: $cwd,
            timeout: null,
        );
        // logger($process);
        $process->run();

        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }

    public function render()
    {
        $relatedBlogs = Blog::where('id', '!=', $this->blog->id)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();
        return view('livewire.blogs.single-blog', [
            'relatedBlog' => $relatedBlogs,
        ])->layout('layouts.guest');
    }
}
