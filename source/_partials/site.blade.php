{{--
    Just coming across this codebase for the first time?

    This looks a little different from most Jigsaw code, because it's using Blade to generate a template that will then be consumed by Vue.

    That's why you're seeing {| and |} everywhere; those are the custom delimiters we've set up for our Vue-in-Blade code.

    Why did we do it this way instead of just plain Blade? Well, this is one of several ways to output your data from Jigsaw and consume it with a frontend framework. This way we can use Vue to implement the filtering, but still use Jigsaw and Blade for the general foundation of the data and the template.
--}}
<div class="flex w-[380px] m-2 shadow hover:shadow-md">
    <div class="flex-1">
        <a :href="site.url" class="block">
            <img v-lazy="site.image" alt="Web site screenshot" class="block border">
        </a>

        <div class="px-6 py-4 text-sm bg-white">
            <a :href="site.url" class="block mb-1 text-gray-800">
                {| site.title |}
            </a>

            <div class="mb-4 text-gray-600">by {| site.authors.join(', ') |}</div>

            <div class="mb-2">
                <button
                    v-for="type in site.types"
                    class="cursor-pointer py-1 px-2 rounded mr-2 text-white text-xs"
                    :style="{ background: colors[type] }"
                    @click="filterType(type)"
                >
                    {| _.startCase(type) |}
                </button>
            </div>
        </div>
        <div class="bg-white flex text-sm border-t">
            <a
                :href="site.url"
                class="flex items-center justify-center flex-1 hover:no-underline p-4 text-sky-600 text-center hover:bg-sky-600 hover:text-white"
            >
                <svg width="12px" height="12px" class="mr-2"><use xlink:href="#icon-visit-website"/></svg>
                Visit website
            </a>

            <a
                v-if="site.repo"
                :href="site.repo"
                class="flex items-center justify-center flex-1 hover:no-underline p-4 text-sky-600 text-center hover:bg-sky-600 hover:text-white"
            >
                <svg width="12px" height="12px" class="mr-2"><use xlink:href="#icon-visit-repo"/></svg>
                Visit repo
            </a>
        </div>
    </div>
</div>
