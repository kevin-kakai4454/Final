// const videourl = document.querySelector('.url');
// const button = document.querySelector('.download')
// const video_id = videourl.baseURI.slice(-11); 
// const downloadUrl = `${videourl.href}${video_id}`;


// const download = function(filename, text){
//     let element = document.createElement('a');
//     element.setAttribute('href','data.text/plain;charset=utf-8,' + encodeURIComponent(input));
//     element.setAttribute('download',filename);
//     element.style.display='none';
//     document.body.appendChild(element);
//     element.click()
//     document.body.removeChild(element);
  
//   }





const { exec } = require('child_process');

const downloadVideo = (url) => {

    console.log('EXEC', exec)
    exec(`yt-dlp.exe "${url}"`, (error, stdout, stderr) => {
        if (error) {
            console.error(`Error: ${error.message}`);
            return;
        }
        if (stderr) {
            console.error(`stderr: ${stderr}`);
            return;
        }
        console.log(`stdout: ${stdout}`);
    });
};

// Example usage:
const videoUrl = 'https://www.youtube.com/watch?v=example'; // replace with your video URL
downloadVideo(`https://www.youtube.com/watch?v=VCdFFQvJl2k`);







  
// download function DOWNLOADING VIDEOS 

function downloadFile(url) {
  fetch(url)
      .then(response => response.blob())
      .then(blob => {
          const url = window.URL.createObjectURL(blob);
          const a = document.createElement('a');
          a.style.display = 'none';
          a.href = url;
          a.download = 'downloadedFile'; // You can specify the filename here
          document.body.appendChild(a);
          a.click();
          window.URL.revokeObjectURL(url);
      })
      .catch(err => console.error('Download failed:', err));
}

// Example usage:
// downloadFile('https://example.com/path/to/video.mp4');

// button.addEventListener('click', async()=>{
//     console.log(downloadUrl);
//     // downloadFile(downloadUrl);
// downloadVideo(downloadUrl);


        //   // const file = resp
          // try{
          //   const response = await fetch(downloadUrl);
          //   const file = await response.blob();
          //   const link = await document.createElement('a');
          //   link.href = URL.createObjectURL(file);
          //   link.download= new Date().getTime();
          //   link.click();
        
          // }catch(error){
          //   alert("Filed to download the file");
          // }
// });





