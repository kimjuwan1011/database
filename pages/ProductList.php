
<div class="container">
    <div class="row">
        <!-- 카테고리 -->
        <div class="col-3">
            <ul id="album-list" class="list-group">
              <li class="list-group-item">Loading...</li>
            </ul>
        </div>

        <!-- 상품목록 -->
         <div id="photo-list" class="col-9 row">

         <p>Loading...</p>
         
      </div>
  </div>
</div>


<!-- ====== Java Script ====== -->


<script>
/**
 * 앨범목록 데이터 조회
 */
async function getData(){
    const url = "/api/albums";
    const response = await fetch(url);
    const jsonData = await response.json();

    const result = jsonData.map((album)=>{
      return `<li class="list-group-item" onClick="getPhotos(${album.id})">${album.title}</li>`;
    }).join('');
    document.getElementById('album-list').innerHTML = result;
  }

  /**
   * 
   */
  async function getPhotos(albumId){
    const url = `https://jsonplaceholder.typicode.com/photos?albumId=${albumId}`
    const response = await fetch(url);
    const jsonData = await response.json();

    const result = jsonData.map((album)=>{
      return `
      <div class="col-4">
          <div class="card" style="width: 100%; height: 370px; margin-bottom: 10px;">
            <img src="${album.thumbnailUrl}" width="100%" height="220"
            class="card-img-top">
              <div class="card-body">
                  <p class="card-text">${album.title}</p>
                  <a href="/products/${album.id}" class="btn btn-primary">Go somewhere</a>
               </div>
            </div>
         </div>`;
    }).join('');
    document.getElementById('photo-list').innerHTML = result;
  }

  getData();
</script>