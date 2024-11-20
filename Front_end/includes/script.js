
console.log("connected");

// Url for youtube api
const search_url = "https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=20&channelId=UCi3TM45fvoNJMGsXeuQl3KQ&key=AIzaSyDSRm44FuH_Q7931DA5CZHxiE6T1MEj2ho";
const phpurl = "includes/api.php";
const dburl = "includes/api2.php";

const searchResults = document.querySelector('.results_link');
const inputSearch = document.querySelector('#keyword');
const searchbtn = document.querySelector('#search');
const searchmodal = document.querySelector('#btn');
const row = document.querySelector('.row');
const column = document.querySelector('#column1');
const searchres = document.querySelector('.modal-body');
const result = document.querySelector('#results');
const link = document.querySelector('.card-title');
let downloadv;
let local =[];
let searchdata= [];
let video = {};

// 

// column.classList.add('d-none');
// column.classList.remove('d-none');

// Html display function
const html = function(video){
    const html2 =   `
            <div class=" card mb-3">
              <a href="includes/view.php?video_id=${video.video_id}">
              <img src="${video.thumbnail_url}" class="card-img-top" alt="...">
              </a>
              <div class="card-body">
              <a href="includes/view.php?video_id=${video.video_id}">
              <h5 class="card-title">${video.title}</h5>
              </a>              
              <p class="card-text">${video.description.slice(0,50)} . . .</p>
              <p class="card-text"><small class="text-body-secondary">Created on${video.publish_date}</small></p>
            </div>
            <button class="btn btn-primary download">Download</button>
              
                `
                return html2;
  }

  // <a href="https://www.youtube.com/watch?v=${video.video_id}">

  const searchDisplay = function(data){
    const search = `
    <div class="results">
        <a class="results_link" >${data.title}.</a>
        <hr>
    </div>
    `
    return search;
  }


//   function getNextpagedata
const nextPageData = function(data){
  const next = data.pageInfo.totalResults ;
  const pageToken = data.nextPageToken;
  console.log(next , pageToken);
  
  fetch(`https://youtube.googleapis.com/youtube/v3/search?part=snippet&contentDetails&statistics&status&maxResults=${next}&channelId=UCi3TM45fvoNJMGsXeuQl3KQ&pageToken=${pageToken}&key=AIzaSyDSRm44FuH_Q7931DA5CZHxiE6T1MEj2ho`)
  .then(function(ress){
    return ress.json();
  })
  .then(function(page){
    console.log(page);

    data.items.forEach(element => {
      local.push(element);
      // localStorage.setItem('localdata3',JSON.stringify(local));
 video = {
    video_id: element.id.videoId,
    title : element.snippet.title,
    description:element.snippet.description,
    thumbnail_url :element.snippet.thumbnails.high.url,
    channel_id:element.snippet.channelId,
    channel_name:element.snippet.channelTitle,
    publish_date:element.snippet.publishTime,
    duration: 300,
    keywords: 'coding'
}
        row.innerHTML += html(video);
        // saveVideo(video);
        
      });

  })
  .catch(error => console.error('Error Fetching youtube data :', error));
  
}

//   Fetch data function
const getYoutubedata = function(infor){
    fetch(search_url)
    .then(function(res){
      return res.json();
    })
    .then(function(data){
      console.log(data);
     
  

      data.items.forEach(element => {
      local.push(element);
      // localStorage.setItem('localdata3',JSON.stringify(local));
 video = {
    video_id: element.id.videoId,
    title : element.snippet.title,
    description:element.snippet.description,
    thumbnail_url :element.snippet.thumbnails.high.url,
    channel_id:element.snippet.channelId,
    channel_name:element.snippet.channelTitle,
    publish_date:element.snippet.publishTime,
    duration: 300,
    keywords: 'coding'
}
        row.innerHTML += html(video);
        saveVideo(video);
        
      });
      console.log(video);
    })
    .catch(error => console.error('Error Fetching youtube data :', error));
  }


//   function to send data to php 
  const saveVideo = function(data){
  fetch(phpurl, {
    "method":"POST",
    "headers":{
      "Content-Type":"application/json; Charset=utf-8"
    },
    "body":JSON.stringify(data)
  }).then(function(respo){
    console.log(respo);
    return respo.json();
  }).then(function(datas){
    console.log(datas)
  })
  .catch(error => console.error('Error saving video:', error));
}

// getting data fromlocal storage
const getLocaldata = function(){
const datalocal = JSON.parse(localStorage.getItem('localdata3'));
console.log (datalocal);
// saveVideo(datalocal,phpurl);


datalocal.forEach(element => {
 video = {
  video_id: element.id.videoId,
  title : element.snippet.title,
  description:element.snippet.description,
  thumbnail_url :element.snippet.thumbnails.high.url,
  channel_id:element.snippet.channelId,
  channel_name:element.snippet.channelTitle,
  publish_date:element.snippet.publishTime,
  duration: 300,
  keywords: 'coding'
}
// row.innerHTML += html(video);
// saveVideo(video);

});
}
// getLocaldata();

const getDatabaseData = function(dburl){
  fetch(dburl)
  .then(function(res){
    console.log(res)
    return res.json();
  })
  .then(function(data){
    // console.log(data);
    data.forEach(element =>{
      // console.log(element.publish_date);
      video = element;

      column.innerHTML += html(video);
  //    downloadv = document.querySelector('.download');
  //   downloadv.addEventListener('click', function(ev){
  //   ev.preventDefault();
  //   console.log(video);
  // })

    })
  //   const downloadv = document.querySelector('.download');
  // downloadv.addEventListener('click', function(ev){
  //   ev.preventDefault();
  //   console.log(video);
  // })
  })
  .catch(error => console.error('Error Fetching youtube data :', error));

}


// Search from youtube API
const search = function(keyword){
  fetch(`https://youtube.googleapis.com/youtube/v3/search?q=${keyword}&part=snippet&maxResults=20&channelId=UCi3TM45fvoNJMGsXeuQl3KQ&key=AIzaSyDSRm44FuH_Q7931DA5CZHxiE6T1MEj2ho`)
  .then(function(res){
    return res.json()
  })
  .then(function(data){
    console.log(data)
    data.forEach(element =>{
      video = element;
      searchdata.push(video);

      row.innerHTML += html(video);

    })
    
  })
}

/*
// Search from database
const dbSearch = function(keyword){
  fetch("includes/search.php",{
    "method":"POST",
    "headers":{
      "Content-Type": "application/json; charset=utf-8"
    },
    "body":JSON.stringify(keyword)
  }).then(function(res){
    console.log(res);
    return res.json(); 
  })
  .then(function(data){
    console.log(data);
    data.forEach(element =>{
      // console.log(element);
      video = element;

      searchres.innerHTML += searchDisplay(element);

    })
  })
  .catch(error => console.error('Error Fetching youtube data :', error));

}*/
async function dbSearch(keyword) {
  
  const respo = await fetch("includes/search.php",{
    "method":"POST",
    "headers":{
      "Content-Type": "application/json; charset=utf-8"
    },
    "body":JSON.stringify(keyword)
  })
    const data = await respo.json();
    console.log(respo); 
  if(respo.status == 200){
    // console.log(respo.status);
    data.forEach(element =>{
      video = element;
      searchdata.push(video);
      searchres.innerHTML += searchDisplay(element);
      
    })
  }else if(respo.status == 404){
    search(keyword);
  }else{
    alert("Something went wrong");
  }
  
  // .catch(error => console.error('Error Fetching youtube data : ', error));
  console.log(searchdata);

 

}

let keyword;

async function searchpage(keyword,searchdata){
searchmodal.addEventListener('click', function(){

  searchbtn.addEventListener('click', function(ev){
    ev.preventDefault();
     keyword = inputSearch.value;
    console.log(keyword);
    dbSearch(keyword);
    result.addEventListener('click', function(){
      console.log( searchdata);
      // row.classList.add('d-none');
      row.innerHTML = "";
      searchdata.forEach(function(element){
        row.innerHTML += html(element);

      })
      // html(searchdata);
    })
  })
  
  console.log(keyword);
  console.log("button clicked")
})
}
 searchpage(keyword, searchdata);

//  document.addEventListener('load', function(){
//  const downloadv = document.querySelector('.download');
// console.log(download)
//  })
// setInterval(function(){
// column.addEventListener('load', function(){
//   console.log("data loaded");
//  const downloadv = document.querySelector('.download');
//   downloadv.addEventListener('click', function(ev){
//     ev.preventDefault();
//     console.log(video);
//   })

// })
// },3000)

// CALLING FUNCTIONS
// getLocaldata();
// getYoutubedata();
getDatabaseData(dburl);
// dbSearch("php");
// search("php");

/*
const downloadbt = document.querySelector("#download");
const input = document.querySelector(".url").value;

downloadbt.addEventListener('click', function(ev){
  ev.preventDefault();
  let filename = 'text.txt';
  download(filename, input)
})


const download = function(filename, text){
  let element = document.createElement('a');
  element.setAttribute('href','data.text/plain;charset=utf-8,' + encodeURIComponent(input));
  element.setAttribute('download',filename);
  element.style.display='none';
  document.body.appendChild(element);
  element.click()
  document.body.removeChild(element);

}

// downloadbt.addEventListener('click', async()=>{
//   // console.log(input.value);
//   // const file = resp
//   try{
//     const response = await fetch(urlinput.value);
//     const file = await response.blob();
//     const link = await document.createElement('a');
//     link.href = URL.createObjectURL(file);
//     link.download= new Date().getTime();
//     link.click();

//   }catch(error){
//     alert("Filed to download the file");
//   }
// })

*/
