<template>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <slot name="thead"/>
            </thead>
            <tbody>
                <slot name="tbody"/>
            </tbody>
        </table>
    </div>
</template>
