<head>
    <html lang="mx">
    <title>Documentos</title>

    <meta charset="UTF-8">
    <link rel="icon" type="image/jpg" href="http://valparaiso.ventitux.com/public/img/ico.png?v2">
</head>
<script src="//mozilla.github.io/pdf.js/build/pdf.mjs" type="module"></script>

<script type="module">
    // If absolute URL from the remote server is provided, configure the CORS
    // header on that server.
    var url = 'https://valparaiso.ventitux.com/public/doc/Documentos.pdf';

    // Loaded via <script> tag, create shortcut to access PDF.js exports.
    var {
        pdfjsLib
    } = globalThis;

    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.mjs';

    var pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 3,
        canvas = document.getElementById('the-canvas'),
        ctx = canvas.getContext('2d');

    /**
     * Get page info from document, resize canvas accordingly, and render page.
     * @param num Page number.
     */
    function renderPage(num) {
        pageRendering = true;
        // Using promise to fetch the page
        pdfDoc.getPage(num).then(function(page) {
            var viewport = page.getViewport({
                scale: scale
            });
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page into canvas context
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            var renderTask = page.render(renderContext);

            // Wait for rendering to finish
            renderTask.promise.then(function() {
                pageRendering = false;
                if (pageNumPending !== null) {
                    // New page rendering is pending
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });

        // Update page counters
        document.getElementById('page_num').textContent = num;
    }

    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num);
        }
    }

    /**
     * Displays previous page.
     */
    function onPrevPage() {
        if (pageNum <= 1) {
            return;
        }
        pageNum--;
        queueRenderPage(pageNum);
        window.scrollTo(0, 0);
    }
    document.getElementById('prev').addEventListener('click', onPrevPage);

    /**
     * Displays next page.
     */
    function onNextPage() {
        if (pageNum >= pdfDoc.numPages) {
            return;
        }
        pageNum++;
        queueRenderPage(pageNum)
        window.scrollTo(0, 0);
    }
    document.getElementById('next').addEventListener('click', onNextPage);

    /**
     * Asynchronously downloads PDF.
     */
    pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
        pdfDoc = pdfDoc_;
        document.getElementById('page_count').textContent = pdfDoc.numPages;

        // Initial/first page rendering
        renderPage(pageNum);
    });
</script>
<link rel="icon" type="image/jpg" href="{{ secure_url('img/ico.png?v2') }}" />
<link href="{{ secure_url('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
<style>
    #nav {
        position: fixed;
        background: #d7d7d7;
        width: 100%;
        height: 55px;
        top: 0;
        left: 0;
        padding: 15px;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
    }

    button {
        color: #ecf0f1;
        font-size: 25px;
        width: 50px;
        background-color: #e67e22;
        border: 1px solid #f39c12;
        border-radius: 5px;
        cursor: pointer;
        padding: 10px;
        box-shadow: 0px 6px 0px #d35400;
        transition: all 0.1s;
    }

    button:active {
        box-shadow: 0px 2px 0px #d35400;
        position: relative;
        top: 2px;
    }

    #the-canvas {
        margin-top: 20px;
    }

    #buttons {
        width: 20%;
    }

    #pages {
        width: 30%;
        text-align: end;
        font-size: 20pt;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
</style>
<div id="nav">
    <div id="buttons">
        <button id="prev"><i class="fa fa-caret-left"></i></button>
        <button id="next"><i class="fa fa-caret-right"></i></button>
    </div>
    <div id="pages">
        <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
    </div>
</div>

<canvas id="the-canvas" style="width:100%"></canvas>
