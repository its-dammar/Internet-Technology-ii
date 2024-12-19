
### Step 1: Setup Laravel Project

First, ensure you have a Laravel project set up. If not, you can create a new Laravel project:

```bash
composer create-project --prefer-dist laravel/laravel crud-example
```

Navigate to the project folder:

```bash
cd crud-example
```

### Step 2: Create Migration, Model, and Controller

1. **Create the Migration:**

Run the following command to create a migration for your posts:

```bash
php artisan make:migration create_posts_table --create=posts
```

Then, in the migration file (`database/migrations/xxxx_xx_xx_xxxxxx_create_posts_table.php`), define the columns:

```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('image')->nullable();
        $table->timestamps();
    });
}
```

Run the migration:

```bash
php artisan migrate
```

2. **Create the Model:**

Run the following command to create the model:

```bash
php artisan make:model Post
```

### Step 3: Create the Controller

Create a controller to handle CRUD operations:

```bash
php artisan make:controller PostController
```

In the controller (`app/Http/Controllers/PostController.php`), define the following methods:

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,mp4|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            $post->image = $filename;
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,mp4|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image) {
                Storage::delete('public/images/' . $post->image);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            $post->image = $filename;
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Delete image if exists
        if ($post->image) {
            Storage::delete('public/images/' . $post->image);
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}
```

### Step 4: Create Views

1. **Index View:**

Create the `index.blade.php` file inside `resources/views/posts/`:

```php
<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}">Create New Post</a>
    <ul>
        @foreach ($posts as $post)
            <li>
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->description }}</p>
                @if ($post->image)
                    <img src="{{ asset('storage/images/' . $post->image) }}" alt="Post Image" width="100">
                @endif
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
```

2. **Create View:**

Create the `create.blade.php` file inside `resources/views/posts/`:

```php
<!-- resources/views/posts/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <label for="image">Image or Video</label>
            <input type="file" name="image" id="image" accept="image/*,video/*">
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
```

3. **Edit View:**

Create the `edit.blade.php` file inside `resources/views/posts/`:

```php
<!-- resources/views/posts/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required>{{ $post->description }}</textarea>
        </div>
        <div>
            <label for="image">Image or Video</label>
            <input type="file" name="image" id="image" accept="image/*,video/*">
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
```

### Step 5: Define Routes

In `routes/web.php`, define the necessary routes for CRUD operations:

```php
use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
```

### Step 6: Testing the Application

1. **Start the Laravel development server:**

```bash
php artisan serve
```

2. **Access the application:**
   - Open your browser and go to `http://localhost:8000/posts` to view and manage the posts.
   - Create, edit, and delete posts, including image or video files.

