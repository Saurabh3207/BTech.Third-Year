const eduImages = document.querySelectorAll('.edu-image');
const imagePreview = document.getElementById('image-preview');
const previewImage = document.getElementById('preview-image');
const closePreview = document.getElementById('close-preview');

eduImages.forEach((img) => {
    img.addEventListener('click', () => {
        previewImage.src = img.src;
        imagePreview.style.display = 'flex';
    });
});

closePreview.addEventListener('click', () => {
    imagePreview.style.display = 'none';
});

const projectImages = document.querySelectorAll('.project-image');

projectImages.forEach((img) => {
    img.addEventListener('click', () => {
        previewImage.src = img.src;
        imagePreview.style.display = 'flex';
    });
});