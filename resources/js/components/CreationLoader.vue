<script>
</script>

<template>
    <div>
        <div class="blog-post-thumb">
            <img src="images/blog/blog_post03.jpg" alt="img">
            <p class="creating-p">Creating Game In Progress...</p>
        </div>
        <div class="progress-bar"></div>
    </div>
</template>

<style>
.creating-p {
    padding: 1rem 0;
    font-family: 'Roboto', sans-serif;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
}

.progress-bar {
    height: 5px;
    background-color: #ddd;
    position: relative;
}

.progress-bar:before {
    content: "";
    display: block;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background-color: #4CAF50;
    animation: progress-bar 2s ease-in-out infinite;
}

@keyframes progress-bar {
    0% {
        width: 0%;
    }

    50% {
        width: 50%;
    }

    100% {
        width: 100%;
    }
}</style>