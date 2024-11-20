

const { exec } = require('child_process');

            const downloadVideo = (url) => {
            exec(`yt-dlp ${url}`, (error, stdout, stderr) => {
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
            const videoUrl1 = 'https://www.youtube.com/watch?v=VCdFFQvJl2k'; // replace with your video URL
            downloadVideo(videoUrl);