<script setup>
</script>
<template>
    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="d-flex flex-column d-block d-sm-block d-xs-block d-md-none">
                <div class="float-start">
                    <p>{{ new Date().getFullYear() }} &copy;
                        <a href="/" target="_blank">LMS ANU</a>
                    </p>
                </div>
                <div class="float-end">
                    <p>Developed by <a href="http://www.anu.com/" target="_blank">PT. N/A</a></p>
                </div>
            </div>

            <div class="d-none d-sm-none d-md-block">
                <div class="float-start">
                    <p>{{ new Date().getFullYear() }} &copy;
                        <a href="/" target="_blank">LMS ANU</a>
                    </p>
                </div>
                <div class="float-end">
                    <p>Created with <span class="text-danger">
                        <i class="bi bi-arrow-through-heart-fill icon-mid"></i>
                    </span> by <a href="http://www.anu.com/" target="_blank">PT. N/A</a></p>
                </div>
            </div>
        </div>
    </footer>

</template>
