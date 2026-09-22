document.addEventListener('DOMContentLoaded', () => {
    const movieGrid = document.getElementById('movieGrid');
    const searchInput = document.getElementById('movieSearch');
    const genreFilter = document.getElementById('genreFilter');
    const yearFilter = document.getElementById('yearFilter');
    const movieCount = document.getElementById('movieCount');
    const noResults = document.getElementById('noResults');

    let allLoadedMovies = [];

    // 1. Initial Load (Fetch All)
    async function init() {
        console.log("App Starting...");
        await fetchMovies();
        
        // Listeners
        searchInput.addEventListener('input', filterAndDisplay);
        genreFilter.addEventListener('change', filterAndDisplay);
        
        // "Set fetch using year" - Re-fetch whenever a filter changes
        yearFilter.addEventListener('change', async () => {
            console.log(`Year filter changed - Re-fetching for: ${yearFilter.value}`);
            await fetchMovies(); // Simulation of fetching specific data
        });
        genreFilter.addEventListener('change', async () => {
            await fetchMovies();
        });
    }

    // 2. AJAX Fetch Function
    async function fetchMovies() {
        try {
            movieGrid.innerHTML = '<div class="loader">Fetching movie database...</div>';
            
            // Fetch the XML file
            const timestamp = new Date().getTime();
            const response = await fetch(`movies.xml?v=${timestamp}`);
            
            if (!response.ok) throw new Error("Could not fetch movies.xml");
            
            const xmlText = await response.text();
            const parser = new DOMParser();
            const xmlDoc = parser.parseFromString(xmlText, 'text/xml');

            // Parse XML to Array
            const movieNodes = xmlDoc.getElementsByTagName('movie');
            allLoadedMovies = [];

            for (let i = 0; i < movieNodes.length; i++) {
                const node = movieNodes[i];
                const getTagText = (tag) => {
                    const el = node.getElementsByTagName(tag)[0];
                    return el ? el.textContent.trim() : "";
                };

                allLoadedMovies.push({
                    title: getTagText('title'),
                    genre: getTagText('genre'),
                    year: getTagText('year'),
                    rating: getTagText('rating'),
                    poster: getTagText('poster'),
                    description: getTagText('description')
                });
            }

            console.log(`Successfully fetched ${allLoadedMovies.length} movies.`);
            filterAndDisplay();

        } catch (err) {
            console.error(err);
            movieGrid.innerHTML = `<div class="error">Error: ${err.message}</div>`;
        }
    }

    // 3. Filter and Render Logic
    function filterAndDisplay() {
        const query = searchInput.value.toLowerCase().trim();
        const gen = genreFilter.value;
        const yr = yearFilter.value;

        const results = allLoadedMovies.filter(m => {
            const matchQuery = !query || m.title.toLowerCase().includes(query);
            
            // Case-insensitive and trimmed comparison for maximum robustness
            const matchGenre = gen.toLowerCase() === 'all' || 
                               m.genre.toLowerCase().trim() === gen.toLowerCase().trim();
            const matchYear = yr.toLowerCase() === 'all' || 
                              m.year.trim() === yr.trim();
            
            return matchQuery && matchGenre && matchYear;
        });

        // Update UI
        render(results);
    }

    function render(movies) {
        movieGrid.innerHTML = '';
        movieCount.textContent = movies.length;

        if (movies.length === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
            movies.forEach(m => {
                const div = document.createElement('div');
                div.className = 'movie-card';
                div.innerHTML = `
                    <div class="poster-container">
                        <img src="${m.poster}" alt="${m.title}" onerror="this.src='https://via.placeholder.com/300x450?text=No+Image'">
                        <span class="rating-badge">${m.rating}</span>
                    </div>
                    <div class="movie-info">
                        <h4>${m.title}</h4>
                        <div class="movie-meta"><span>${m.year}</span> • <span>${m.genre}</span></div>
                        <p class="movie-description">${m.description}</p>
                    </div>
                `;
                movieGrid.appendChild(div);
            });
        }
    }

    init();
});
