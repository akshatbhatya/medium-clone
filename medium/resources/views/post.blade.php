<x-app-layout>
    <section class="max-w-5xl mx-auto px-8 py-16 bg-gray-900 min-h-screen">
        <h1 class="text-5xl font-extrabold text-gray-100 mb-12 tracking-tight leading-tight">Craft Your Next Story</h1>
        <div class="bg-gray-800 p-8 rounded-xl">
            <form action="{{route("post.store")}}" method="POST" id="postContent">
                @csrf
                <!-- Title -->
                <div class="mb-10">
                    <label for="title" class="block text-lg font-medium text-gray-200 mb-2">Title</label>
                    <input name="title" type="text" id="title" placeholder="Enter a captivating title" class="w-full px-4 py-3 bg-gray-700 border-b border-gray-600 focus:border-green-500 outline-none transition duration-300 text-gray-200 placeholder-gray-400 text-lg">
                </div>

                <!-- Category -->
                <div class="mb-10">
                    <label for="category" class="block text-lg font-medium text-gray-200 mb-2">Category</label>
                    <select name="category" id="category" class="w-full px-4 py-3 bg-gray-700 border-b border-gray-600 focus:border-green-500 outline-none transition duration-300 text-gray-200 text-lg">
                        <option value="" disabled selected>Choose a category</option>
                        <option value="lifestyle">Lifestyle</option>
                        <option value="technology">Technology</option>
                        <option value="travel">Travel</option>
                        <option value="creativity">Creativity</option>
                    </select>
                </div>

                <!-- Editor -->
                <div class="mb-10">
                    <label for="editor" class="block text-lg font-medium text-gray-200 mb-2">Content</label>
                    <div name="content" id="editor" class="min-h-[400px] bg-gray-700 border border-gray-600 rounded-lg text-gray-200"></div>
                </div>
<input type="hidden" name="content" id="cont" value="">
                <!-- Submit Button -->
                <div class="text-right">
                    <button type="submit" class="bg-green-600 text-white px-8 py-3 rounded-full hover:bg-green-700 transition duration-300 text-lg font-medium">Publish Your Post</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Quill Editor -->
  
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
        <style>
            /* Custom Dark Mode Styles for Quill */
            .ql-toolbar.ql-snow {
                background-color: #1f2937; /* gray-800 */
                border-color: #4b5563; /* gray-600 */
                border-radius: 0.5rem 0.5rem 0 0;
            }
            .ql-toolbar.ql-snow .ql-formats button {
                color: #e5e7eb; /* gray-200 */
            }
            .ql-toolbar.ql-snow .ql-formats button:hover,
            .ql-toolbar.ql-snow .ql-formats button.ql-active {
                color: #10b981; /* green-500 */
            }
            .ql-container.ql-snow {
                background-color: #374151; /* gray-700 */
                border-color: #4b5563; /* gray-600 */
                border-radius: 0 0 0.5rem 0.5rem;
                color: #e5e7eb; /* gray-200 */
                min-height: 400px;
            }
            .ql-editor {
                min-height: 360px; /* Ensure content area has height */
                color: #e5e7eb; /* gray-200 */
            }
            .ql-editor::before {
                color: #9ca3af; /* gray-400 for placeholder */
            }
        </style>
   

   
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
        <script>

            const quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Start writing your story...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'],
                        ['link', 'blockquote', 'code-block'],
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                        ['clean']
                    ]
                }
            });

          

          let postContent=document.querySelector("#postContent");
          postContent.addEventListener("submit",()=>{

            let content=  document.querySelector(".ql-editor");
            let contentHidden=document.querySelector("#cont");
            contentHidden.value=content.innerHTML;
          });


        </script>
   
</x-app-layout>