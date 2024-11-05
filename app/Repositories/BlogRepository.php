<?php

namespace App\Repositories;

use App\Contracts\Repositories\BlogInterface;
use App\Http\Requests\Request;
use App\Models\Blog;

class BlogRepository implements BlogInterface
{
    public function __construct(
       private readonly Blog $blogcode
    )
    {
    }

    public function add(object $request): bool
    {
        $data = $request->only([
            'cat_id',
            'title',
            'cat_id',
            'description',
          	'image',
            'slug',
            'created_at',
            'updated_at'
        ]);
        $blogcode = new Blog();
        $blogcode->title = $request->title;
        $blogcode->slug = $request->slug;
        $blogcode->cat_id = $request->cat_id;
        $blogcode->description = $request->description;
        $blogcode->image = $request->image_file;
        return $blogcode->save();
    }

    public function update(object $request): bool
    {
        // Extract only the relevant data from the request
        $data = $request->only([
            'id',
            'title',
            'cat_id',
            'description',
          	'image',
            'slug',
            'created_at',
            'updated_at' 
        ]);

        // Find the Hsncode model by ID
        $blogcode = Blog::find($data['id']);
        if ($blogcode) {
            return $blogcode->update([
                'cat_id' => $data['cat_id'],
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $data['image'],
                'slug'=>  $data['slug'],
              	'created_at' => now(),
                'updated_at'=>now()
            ]);
        }

        // If no record was found, return false
        return false;
    }

    public function updateData(string $model, string $id, string $lang, string $key, string $value):bool
    {
        $this->blogcode->updateOrInsert(
            [
                'Hsncodeable_type' => $model,
                'Hsncodeable_id' => $id,
                'locale' => $lang,
                'key' => $key
            ],
            [
                'value' => $value
            ]
        );
        return true;
    }
    public function delete(object $request): bool
    {
        $id = $request->input('blogId');
        $hsn = Blog::find($id); 
       
        if (!$hsn) {
            return false; 
        }

        $hsn->status = 0;
        $updated = $hsn->save(); 
    
        return $updated;
    }
    
}
