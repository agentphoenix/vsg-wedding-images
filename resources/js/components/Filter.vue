<template>
    <popper trigger="click" :options="{ placement: 'bottom' }">
        <div class="p-4 font-sans text-grey-darkest rounded shadow-stripe-md bg-white w-auto text-lg border popper2">
            <a href="/posts" class="text-grey-darker flex items-center leading-none mb-4">
                <i data-feather="clock" class="h-6 w-6 mr-3 text-blue-dark"></i>
                Filter by latest
            </a>
            <a href="/posts?liked=1" class="text-grey-darker flex items-center leading-none mb-4">
                <i data-feather="heart" class="h-6 w-6 mr-3 text-guava-dark"></i>
                Filter by most liked
            </a>
            <a href="/posts?popular=1" class="text-grey-darker flex items-center leading-none mb-4">
                <i data-feather="activity" class="h-6 w-6 mr-3 text-orange"></i>
                Filter by popular
            </a>
            <a href="/posts?by=name" class="text-grey-darker flex items-center leading-none">
                <i data-feather="user" class="h-6 w-6 mr-3 text-grey-dark"></i>
                Filter by my posts
            </a>

        </div>

        <button slot="reference" class="leading-none text-grey-dark outline-none">
            <i data-feather="filter" class="h-8 w-8"></i>
        </button>
    </popper>
</template>

<style>
  .popper2 {
    display: inline-block;
    position: absolute;
    z-index: 200000;
  }

  .popper2 .popper__arrow {
    width: 0;
    height: 0;
    border-style: solid;
    position: absolute;
    margin: 5px;
    border-radius: 10px;
    display: none;
  }

  .popper2[x-placement^="top"] {
    margin-bottom: 5px;
  }

  .popper2[x-placement^="top"] .popper__arrow {
    border-width: 5px 5px 0 5px;
    border-color: #fff transparent transparent transparent;
    bottom: -5px;
    left: calc(50% - 5px);
    margin-top: 0;
    margin-bottom: 0;
  }

  .popper2[x-placement^="bottom"] {
    margin-top: 10px;
  }

  .popper2[x-placement^="bottom"] .popper__arrow {
    border-width: 0 10px 10px 10px;
    border-color: transparent transparent #c00 transparent;
    top: -10px;
    left: calc(50% - 10px);
    margin-top: 0;
    margin-bottom: 0;
  }

  .popper2[x-placement^="right"] {
    margin-left: 5px;
  }

  .popper2[x-placement^="right"] .popper__arrow {
    border-width: 5px 5px 5px 0;
    border-color: transparent #fafafa transparent transparent;
    left: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
  }

  .popper2[x-placement^="left"] {
    margin-right: 5px;
  }

  .popper2[x-placement^="left"] .popper__arrow {
    border-width: 5px 0 5px 5px;
    border-color: transparent transparent transparent #fafafa;
    right: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
  }
</style>

<script>
import Popper from 'vue-popperjs';

export default {
    components: { Popper }
}
</script>
