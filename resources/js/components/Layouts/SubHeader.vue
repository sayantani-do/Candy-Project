<template>
     <div class="d-flex justify-content-between mb-3">
        <div>
            <h4 class="mb-0">{{title}}</h4>
        </div>
        <div><slot></slot></div>
    </div>
</template>
<script>
    export default {
        props: ["title"],
    }
</script>