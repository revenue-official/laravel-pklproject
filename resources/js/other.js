function analyzeImageBrightness(image) {
    return new Promise((resolve, reject) => {
        const img = new Image();
        img.src = image.src;
        img.onload = function() {
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.width = img.width;
            canvas.height = img.height;
            context.drawImage(img, 0, 0);
            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
            const data = imageData.data;
            let totalBrightness = 0;
            for (let i = 0; i < data.length; i += 4) {
                const r = data[i];
                const g = data[i + 1];
                const b = data[i + 2];
                const brightness = (r + g + b) / 3;
                totalBrightness += brightness;
            }
            const averageBrightness = totalBrightness / (canvas.width * canvas.height);
            resolve(averageBrightness);
        };
        img.onerror = function() {
            reject("Gagal memuat gambar");
        };
    });
}


// Contoh penggunaan dengan querySelectorAll
const imageElements = document.querySelectorAll('.analyze-image');

const analyzePromises = Array.from(imageElements).map((imageElement) => {
    let dataId = imageElement.attributes.dataid.value;

    return analyzeImageBrightness(imageElement).then(averageBrightness => {
        return { index: dataId, brightness: averageBrightness };
    });
});

Promise.all(analyzePromises)
    .then(results => {
        results.forEach(result => {
            const { index, brightness } = result;
            const proText1 = document.querySelector(`.pro-text-a${index}`);
            const proText2 = document.querySelector(`.pro-text-b${index}`);
            const analyzeImage = document.querySelector(`.analyze-image`);

            if (brightness > 150) {
                analyzeImage.classList.add('brightness-[0.8]', 'sm:brightness-[0.4]');
            } else {


            }
        });
    })
    .catch(error => {
        console.error("Terjadi kesalahan:", error);
    });
