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
            ['language' => 'abap', 'color' => null],
            ['language' => 'actionscript-3', 'color' => null],
            ['language' => 'ada', 'color' => null],
            ['language' => 'apex', 'color' => null],
            ['language' => 'applescript', 'color' => null],
            ['language' => 'asm', 'color' => null],
            ['language' => 'awk', 'color' => null],
            ['language' => 'batch', 'color' => null],
            ['language' => 'c', 'color' => null],
            ['language' => 'csharp', 'color' => null],
            ['language' => 'cpp', 'color' => null],
            ['language' => 'clojure', 'color' => null],
            ['language' => 'cobol', 'color' => null],
            ['language' => 'coffee', 'color' => null],
            ['language' => 'crystal', 'color' => null],
            ['language' => 'css', 'color' => '#2965f1'],
            ['language' => 'curl', 'color' => null],
            ['language' => 'd', 'color' => null],
            ['language' => 'dart', 'color' => null],
            ['language' => 'dockerfile', 'color' => null],
            ['language' => 'elixir', 'color' => null],
            ['language' => 'elm', 'color' => null],
            ['language' => 'erb', 'color' => null],
            ['language' => 'erlang', 'color' => null],
            ['language' => 'fsharp', 'color' => null],
            ['language' => 'git-commit', 'color' => null],
            ['language' => 'diff', 'color' => null],
            ['language' => 'git-ignore', 'color' => null],
            ['language' => 'git-rebase', 'color' => null],
            ['language' => 'gnuplot', 'color' => null],
            ['language' => 'go', 'color' => null],
            ['language' => 'graphql', 'color' => null],
            ['language' => 'groovy', 'color' => null],
            ['language' => 'hack', 'color' => null],
            ['language' => 'haml', 'color' => null],
            ['language' => 'handlebars', 'color' => null],
            ['language' => 'hcl', 'color' => null],
            ['language' => 'haskell', 'color' => null],
            ['language' => 'hlsl', 'color' => null],
            ['language' => 'html', 'color' => null],
            ['language' => 'ini', 'color' => null],
            ['language' => 'java', 'color' => null],
            ['language' => 'javascript', 'color' => null],
            ['language' => 'jinja-html', 'color' => null],
            ['language' => 'json', 'color' => null],
            ['language' => 'jsonc', 'color' => null],
            ['language' => 'jsonnet', 'color' => null],
            ['language' => 'jsx', 'color' => null],
            ['language' => 'julia', 'color' => null],
            ['language' => 'kotlin', 'color' => null],
            ['language' => 'blade', 'color' => null],
            ['language' => 'latex', 'color' => null],
            ['language' => 'less', 'color' => null],
            ['language' => 'lisp', 'color' => null],
            ['language' => 'logo', 'color' => null],
            ['language' => 'lua', 'color' => null],
            ['language' => 'makefile', 'color' => null],
            ['language' => 'markdown', 'color' => null],
            ['language' => 'matlab', 'color' => null],
            ['language' => 'mdx', 'color' => null],
            ['language' => 'nix', 'color' => null],
            ['language' => 'objective-c', 'color' => null],
            ['language' => 'ocaml', 'color' => null],
            ['language' => 'pascal', 'color' => null],
            ['language' => 'perl', 'color' => null],
            ['language' => 'perl6', 'color' => null],
            ['language' => 'php', 'color' => '#8993be'],
            ['language' => 'plaintext', 'color' => null],
            ['language' => 'pls', 'color' => null],
            ['language' => 'postcss', 'color' => null],
            ['language' => 'powershell', 'color' => null],
            ['language' => 'prolog', 'color' => null],
            ['language' => 'jade', 'color' => null],
            ['language' => 'puppet', 'color' => null],
            ['language' => 'purescript', 'color' => null],
            ['language' => 'python', 'color' => null],
            ['language' => 'r', 'color' => null],
            ['language' => 'razor', 'color' => null],
            ['language' => 'ruby', 'color' => null],
            ['language' => 'rust', 'color' => null],
            ['language' => 'sas', 'color' => null],
            ['language' => 'sass', 'color' => null],
            ['language' => 'scala', 'color' => null],
            ['language' => 'scheme', 'color' => null],
            ['language' => 'scss', 'color' => null],
            ['language' => 'shaderlab', 'color' => null],
            ['language' => 'shell', 'color' => null],
            ['language' => 'smalltalk', 'color' => null],
            ['language' => 'sql', 'color' => null],
            ['language' => 'ssh-config', 'color' => null],
            ['language' => 'antlers', 'color' => null],
            ['language' => 'stylus', 'color' => null],
            ['language' => 'swift', 'color' => null],
            ['language' => 'tcl', 'color' => null],
            ['language' => 'toml', 'color' => null],
            ['language' => 'tsx', 'color' => null],
            ['language' => 'typescript', 'color' => null],
            ['language' => 'cmd', 'color' => null],
            ['language' => 'viml', 'color' => null],
            ['language' => 'vue', 'color' => null],
            ['language' => 'wasm', 'color' => null],
            ['language' => 'wenyan', 'color' => null],
            ['language' => 'xml', 'color' => null],
            ['language' => 'xsl', 'color' => null],
            ['language' => 'yaml', 'color' => null],
        ];

        Language::truncate();

        foreach($resources as $resource) {
            Language::create([
                'language' => $resource['language'],
                'color' => $resource['color'],
            ]);
        }
    }
}
