<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPTX Slideshow Viewer</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pptx.js/0.10.1/pptxjs.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .slide-container {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }
        
        .slide-container:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .slide-navigation button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .progress-bar {
            height: 6px;
            transition: width 0.3s ease;
        }
        
        #slideCount {
            min-width: 80px;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .controls-container {
                flex-direction: column-reverse;
                gap: 1rem;
            }
            
            .slide-navigation {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center py-12 px-4">
    <div class="w-full max-w-4xl">
        <div id="presentationContainer">
            <div class="slide-container bg-white rounded-lg overflow-hidden">
                <div id="slideContent" class="flex items-center justify-center p-4 min-h-[80vh]"></div>
            </div>
        </div>
        
        <div id="presentationContainer" class="hidden">
            <div class="flex items-center justify-between mb-4">
                <h2 id="presentationTitle" class="text-xl font-semibold text-gray-800 truncate"></h2>
                <div id="slideCount" class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full"></div>
            </div>
            
            <div id="progressContainer" class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                <div id="progressBar" class="progress-bar bg-blue-600 h-2.5 rounded-full"></div>
            </div>
            
            <div class="slide-container bg-white rounded-lg overflow-hidden mb-6">
                <div id="slideContent" class="flex items-center justify-center p-4 min-h-80">
                    <p class="text-gray-500">No presentation loaded. Please upload a PPTX file.</p>
                </div>
            </div>
            
            <div class="controls-container flex flex-wrap justify-between items-center gap-4">
                <div class="slide-navigation flex items-center gap-2">
                    <button id="firstSlide" class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 disabled:opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="prevSlide" class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 disabled:opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="nextSlide" class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 disabled:opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <button id="lastSlide" class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 disabled:opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                
                <div class="flex items-center gap-4">
                    <button id="fullscreenButton" class="flex items-center gap-2 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                        </svg>
                        Fullscreen
                    </button>
                    
                    <button id="downloadButton" class="flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Configure PPTX file path here
        const PPTX_FILE_PATH = '<?= base_url();?>assets/LampuPetromak.pptx';
        
        document.addEventListener('DOMContentLoaded', function() {
            // Show demo link after a short delay
            setTimeout(() => {
                document.getElementById('demoLink').classList.remove('hidden');
            }, 2000);
            
            // Initialize pptx.js
            const pptx = pptxjs();
            let presentation = null;
            let currentSlideIndex = 0;
            let slideCount = 0;
            let fileBlob = null;
            
            // DOM elements
            const slideContent = document.getElementById('slideContent');
            
            // Auto load presentation from assets on page load
            loadFromAssets();
            
            // Navigation events
            firstSlideBtn.addEventListener('click', () => navigateToSlide(0));
            prevSlideBtn.addEventListener('click', () => navigateToSlide(currentSlideIndex - 1));
            nextSlideBtn.addEventListener('click', () => navigateToSlide(currentSlideIndex + 1));
            lastSlideBtn.addEventListener('click', () => navigateToSlide(slideCount - 1));
            
            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (!presentation) return;
                
                if (e.key === 'ArrowRight' || e.key === ' ' || e.key === 'PageDown') {
                    navigateToSlide(currentSlideIndex + 1);
                } else if (e.key === 'ArrowLeft' || e.key === 'PageUp') {
                    navigateToSlide(currentSlideIndex - 1);
                } else if (e.key === 'Home') {
                    navigateToSlide(0);
                } else if (e.key === 'End') {
                    navigateToSlide(slideCount - 1);
                }
            });
            
            // Fullscreen mode
            fullscreenButton.addEventListener('click', toggleFullscreen);
            
            // Download button
            downloadButton.addEventListener('click', downloadPresentation);
            
            // Configure this path to your PPTX file location
            const pptxFilePath = '<?= base_url();?>assets/LampuPetromak.pptx';
            
            async function loadFromAssets() {
                try {
                    const response = await fetch(pptxFilePath);
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.statusText);
                    }
                    const arrayBuffer = await response.arrayBuffer();
                    const presentation = await pptx.load(arrayBuffer);
                    
                    // Render first slide
                    const slide = presentation.slides[0];
                    const slideContainer = document.createElement('div');
                    slideContainer.className = 'w-full h-full flex items-center justify-center';
                    slideContent.appendChild(slideContainer);
                    slide.render(slideContainer);
                    
                } catch (error) {
                    console.error('Error loading presentation:', error);
                    slideContent.innerHTML = '<p class="text-gray-500">Presentation could not be loaded</p>';
                }
            }
            
            function renderSlide(index) {
                if (!presentation || index < 0 || index >= slideCount) return;
                
                slideContent.innerHTML = '';
                const slide = presentation.slides[index];
                
                // Create a container for the slide
                const slideContainer = document.createElement('div');
                slideContainer.className = 'w-full h-full flex items-center justify-center';
                slideContent.appendChild(slideContainer);
                
                // Render the slide
                slide.render(slideContainer);
                
                // Update current slide index and UI
                currentSlideIndex = index;
                slideCountDisplay.textContent = `${index + 1} of ${slideCount}`;
                progressBar.style.width = `${((index + 1) / slideCount) * 100}%`;
                
                // Update navigation buttons
                updateNavigationButtons();
            }
            
            function navigateToSlide(index) {
                if (index < 0) index = 0;
                if (index >= slideCount) index = slideCount - 1;
                
                renderSlide(index);
            }
            
            function updateNavigationButtons() {
                firstSlideBtn.disabled = currentSlideIndex <= 0;
                prevSlideBtn.disabled = currentSlideIndex <= 0;
                nextSlideBtn.disabled = currentSlideIndex >= slideCount - 1;
                lastSlideBtn.disabled = currentSlideIndex >= slideCount - 1;
            }
            
            function toggleFullscreen() {
                if (!document.fullscreenElement) {
                    slideContent.requestFullscreen().catch(err => {
                        console.error('Error attempting to enable fullscreen:', err);
                    });
                } else {
                    document.exitFullscreen();
                }
            }
            
            function downloadPresentation() {
                if (!fileBlob) return;
                
                const url = URL.createObjectURL(fileBlob);
                const a = document.createElement('a');
                a.href = url;
                a.download = presentationTitle.textContent + '.pptx';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            }
        });
    </script>
</body>
</html>

