<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = [
            ['language' => 'abap', 'bg_color' => null, 'text_color' => null],
            ['language' => 'actionscript-3', 'bg_color' => null, 'text_color' => null],
            ['language' => 'ada', 'bg_color' => null, 'text_color' => null],
            ['language' => 'apex', 'bg_color' => null, 'text_color' => null],
            ['language' => 'applescript', 'bg_color' => null, 'text_color' => null],
            ['language' => 'asm', 'bg_color' => null, 'text_color' => null],
            ['language' => 'awk', 'bg_color' => null, 'text_color' => null],
            ['language' => 'batch', 'bg_color' => null, 'text_color' => null],
            ['language' => 'c', 'bg_color' => null, 'text_color' => null],
            ['language' => 'csharp', 'bg_color' => null, 'text_color' => null],
            ['language' => 'cpp', 'bg_color' => null, 'text_color' => null],
            ['language' => 'clojure', 'bg_color' => null, 'text_color' => null],
            ['language' => 'cobol', 'bg_color' => null, 'text_color' => null],
            ['language' => 'coffee', 'bg_color' => null, 'text_color' => null],
            ['language' => 'crystal', 'bg_color' => null, 'text_color' => null],
            ['language' => 'css', 'bg_color' => '#2965f1', 'text_color' => null],
            ['language' => 'curl', 'bg_color' => null, 'text_color' => null],
            ['language' => 'd', 'bg_color' => null, 'text_color' => null],
            ['language' => 'dart', 'bg_color' => null, 'text_color' => null],
            ['language' => 'dockerfile', 'bg_color' => null, 'text_color' => null],
            ['language' => 'elixir', 'bg_color' => null, 'text_color' => null],
            ['language' => 'elm', 'bg_color' => null, 'text_color' => null],
            ['language' => 'erb', 'bg_color' => null, 'text_color' => null],
            ['language' => 'erlang', 'bg_color' => null, 'text_color' => null],
            ['language' => 'fsharp', 'bg_color' => null, 'text_color' => null],
            ['language' => 'git-commit', 'bg_color' => null, 'text_color' => null],
            ['language' => 'diff', 'bg_color' => null, 'text_color' => null],
            ['language' => 'git-ignore', 'bg_color' => null, 'text_color' => null],
            ['language' => 'git-rebase', 'bg_color' => null, 'text_color' => null],
            ['language' => 'gnuplot', 'bg_color' => null, 'text_color' => null],
            ['language' => 'go', 'bg_color' => null, 'text_color' => null],
            ['language' => 'graphql', 'bg_color' => null, 'text_color' => null],
            ['language' => 'groovy', 'bg_color' => null, 'text_color' => null],
            ['language' => 'hack', 'bg_color' => null, 'text_color' => null],
            ['language' => 'haml', 'bg_color' => null, 'text_color' => null],
            ['language' => 'handlebars', 'bg_color' => null, 'text_color' => null],
            ['language' => 'hcl', 'bg_color' => null, 'text_color' => null],
            ['language' => 'haskell', 'bg_color' => null, 'text_color' => null],
            ['language' => 'hlsl', 'bg_color' => null, 'text_color' => null],
            ['language' => 'html', 'bg_color' => null, 'text_color' => null],
            ['language' => 'ini', 'bg_color' => null, 'text_color' => null],
            ['language' => 'java', 'bg_color' => null, 'text_color' => null],
            ['language' => 'javascript', 'bg_color' => null, 'text_color' => null],
            ['language' => 'jinja-html', 'bg_color' => null, 'text_color' => null],
            ['language' => 'json', 'bg_color' => null, 'text_color' => null],
            ['language' => 'jsonc', 'bg_color' => null, 'text_color' => null],
            ['language' => 'jsonnet', 'bg_color' => null, 'text_color' => null],
            ['language' => 'jsx', 'bg_color' => null, 'text_color' => null],
            ['language' => 'julia', 'bg_color' => null, 'text_color' => null],
            ['language' => 'kotlin', 'bg_color' => null, 'text_color' => null],
            ['language' => 'blade', 'bg_color' => null, 'text_color' => null],
            ['language' => 'latex', 'bg_color' => null, 'text_color' => null],
            ['language' => 'less', 'bg_color' => null, 'text_color' => null],
            ['language' => 'lisp', 'bg_color' => null, 'text_color' => null],
            ['language' => 'logo', 'bg_color' => null, 'text_color' => null],
            ['language' => 'lua', 'bg_color' => null, 'text_color' => null],
            ['language' => 'makefile', 'bg_color' => null, 'text_color' => null],
            ['language' => 'markdown', 'bg_color' => null, 'text_color' => null],
            ['language' => 'matlab', 'bg_color' => null, 'text_color' => null],
            ['language' => 'mdx', 'bg_color' => null, 'text_color' => null],
            ['language' => 'nix', 'bg_color' => null, 'text_color' => null],
            ['language' => 'objective-c', 'bg_color' => null, 'text_color' => null],
            ['language' => 'ocaml', 'bg_color' => null, 'text_color' => null],
            ['language' => 'pascal', 'bg_color' => null, 'text_color' => null],
            ['language' => 'perl', 'bg_color' => null, 'text_color' => null],
            ['language' => 'perl6', 'bg_color' => null, 'text_color' => null],
            ['language' => 'php', 'bg_color' => '#8993be', 'text_color' => '#ffffff'],
            ['language' => 'plaintext', 'bg_color' => null, 'text_color' => null],
            ['language' => 'pls', 'bg_color' => null, 'text_color' => null],
            ['language' => 'postcss', 'bg_color' => null, 'text_color' => null],
            ['language' => 'powershell', 'bg_color' => null, 'text_color' => null],
            ['language' => 'prolog', 'bg_color' => null, 'text_color' => null],
            ['language' => 'jade', 'bg_color' => null, 'text_color' => null],
            ['language' => 'puppet', 'bg_color' => null, 'text_color' => null],
            ['language' => 'purescript', 'bg_color' => null, 'text_color' => null],
            ['language' => 'python', 'bg_color' => null, 'text_color' => null],
            ['language' => 'r', 'bg_color' => null, 'text_color' => null],
            ['language' => 'razor', 'bg_color' => null, 'text_color' => null],
            ['language' => 'ruby', 'bg_color' => null, 'text_color' => null],
            ['language' => 'rust', 'bg_color' => null, 'text_color' => null],
            ['language' => 'sas', 'bg_color' => null, 'text_color' => null],
            ['language' => 'sass', 'bg_color' => null, 'text_color' => null],
            ['language' => 'scala', 'bg_color' => null, 'text_color' => null],
            ['language' => 'scheme', 'bg_color' => null, 'text_color' => null],
            ['language' => 'scss', 'bg_color' => null, 'text_color' => null],
            ['language' => 'shaderlab', 'bg_color' => null, 'text_color' => null],
            ['language' => 'shell', 'bg_color' => null, 'text_color' => null],
            ['language' => 'smalltalk', 'bg_color' => null, 'text_color' => null],
            ['language' => 'sql', 'bg_color' => null, 'text_color' => null],
            ['language' => 'ssh-config', 'bg_color' => null, 'text_color' => null],
            ['language' => 'antlers', 'bg_color' => null, 'text_color' => null],
            ['language' => 'stylus', 'bg_color' => null, 'text_color' => null],
            ['language' => 'swift', 'bg_color' => null, 'text_color' => null],
            ['language' => 'tcl', 'bg_color' => null, 'text_color' => null],
            ['language' => 'toml', 'bg_color' => null, 'text_color' => null],
            ['language' => 'tsx', 'bg_color' => null, 'text_color' => null],
            ['language' => 'typescript', 'bg_color' => null, 'text_color' => null],
            ['language' => 'cmd', 'bg_color' => null, 'text_color' => null],
            ['language' => 'viml', 'bg_color' => null, 'text_color' => null],
            ['language' => 'vue', 'bg_color' => null, 'text_color' => null],
            ['language' => 'wasm', 'bg_color' => null, 'text_color' => null],
            ['language' => 'wenyan', 'bg_color' => null, 'text_color' => null],
            ['language' => 'xml', 'bg_color' => null, 'text_color' => null],
            ['language' => 'xsl', 'bg_color' => null, 'text_color' => null],
            ['language' => 'yaml', 'bg_color' => null, 'text_color' => null],
        ];

        Language::truncate();

        foreach($resources as $resource) {
            Language::create([
                'language' => $resource['language'],
                'bg_color' => $resource['bg_color'],
                'text_color' => $resource['text_color'],
            ]);
        }
    }
}
