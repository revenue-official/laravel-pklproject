document.addEventListener('DOMContentLoaded', function() {
    // isikan parameter sesuai urutan text, color, fontSize, fontWeight 
    customConsole('LARAVEL PROJECT', 'red', '20px', 'bold');
});

const customConsole = (text, color, fontSize, fontWeight) => {
    if (!text, !color, !fontSize, !fontWeight) {
        return console.log('null');
    } else {
        const style = `color: ${color}; font-size: ${fontSize}; font-weight: ${fontWeight};`;
        console.log(`%c${text}`, style);
    }
}
