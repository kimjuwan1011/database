<div class="container">
    <div class="row">
        <div id="left-content" class="col-4"></div>
        <div id="right-content" class="col-8">123</div>
    </div>
</div>

<script>
    async function getData(photoId){
        const url = `https://jsonplaceholder.typicode.com/photos/${photoId}`;
        const response = await fetch(url);
        const jsonData = await response.json();

        document.getElementById('left-content').innerHTML = `
            <img src="https://img.magnific.com/free-photo/
            beautiful-beach-sea_74190-3821.jpg?semt=ais_test_b&w=740&q=80" width="100%" />
        `;

        document.getElementById('right-content').innerHTML = `
            <div>
                <h1>photo id: ${jsonData.id}</h1>
                <p>thumbnail url: ${jsonData.thumbnailUrl}</p>
                <p>${jsonData.title}</p>
            </div>
        `;
    }

    getData(<?= $param2 ?>);
</script>