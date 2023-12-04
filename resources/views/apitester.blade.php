@php
if (isset($data)) {
$data = json_decode($data, true);
echo $data;
}
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>APIs Tester</title>
</head>

<body>
    <nav class="bg-indigo-500 py-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <div class="text-white font-semibold text-lg">Testing Your APIs</div>
                <input id="searching" type="text" placeholder="Search" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            </div>
        </div>
    </nav>
    <div class="flex w-full min-h-screen bg-neutral-200 justify-evenly">
        <span id="isMovies">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="" alt="Image">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Title</div>
                    <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id ligula porta felis euismod semper.
                    </p>
                </div>
                <div class="px-6 py-4">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">Tag 1</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">Tag 2</span>
                </div>
            </div>
        </span>
    </div>
</body>
<script type="text/javascript">
document.querySelector('#searching').addEventListener('keyup', function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        const apiKey = 'b9b257ab';
        const searchTerm = document.querySelector('#searching').value;

        fetch(`http://www.omdbapi.com/?apikey=${apiKey}&s=${searchTerm}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.Response === 'True') {
                    const movieTitles = data.Search;
                    movieTitles.forEach(movie => {

                    })

                } else {
                    document.getElementById('fix').innerHTML = 'Movies not Found';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
});

</script>

</html>
