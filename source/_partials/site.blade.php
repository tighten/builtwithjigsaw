{{--
    Just coming across this codebase for the first time?

    This looks a little different from most Jigsaw code, because it's using Blade to generate a template that will then be consumed by Vue.

    That's why you're seeing {| and |} everywhere; those are the custom delimiters we've set up for our Vue-in-Blade code.

    Why did we do it this way instead of just plain Blade? Well, this is one of several ways to output your data from Jigsaw and consume it with a frontend framework. This way we can use Vue to implement the filtering, but still use Jigsaw and Blade for the general foundation of the data and the template.
--}}
<div class="flex m-2 shadow hover:shadow-md" style="width: 380px;">
    <div class="flex-1">
        <a :href="site.url" class="block"><img v-lazy="site.image" alt="Web site screenshot" class="block border"></a>

        <div class="bg-white px-6 py-4 text-sm">
            <a
                :href="site.url"
                class="block mb-1 no-underline text-grey-darkest"
                >
                {| site.title |}
            </a>

            <div class="mb-4 text-grey-dark">by {| site.authors.join(', ') |}</div>

            <div class="mb-2">
                <span
                    v-for="type in site.types"
                    class="bg-green cursor-pointer inline-block py-1 px-2 rounded mr-2 text-white text-xs"
                    :style="{ background: colors[type] }"
                    @click="filterType(type)"
                    >{| _.startCase(type) |}</span>
            </div>
        </div>
        <div class="bg-white flex text-sm border-t">
            <a
                :href="site.url"
                class="flex-1 no-underline hover:no-underline p-4 text-blue text-center hover:bg-blue hover:text-white"
                >
                <svg width="12px" height="12px" class="mr-1"><use xlink:href="#icon-visit-website"/></svg>
                Visit website
            </a>

            <a
                v-if="site.repo"
                :href="site.repo"
                class="flex-1 no-underline hover:no-underline p-4 text-blue text-center hover:bg-blue hover:text-white"
                >
                <svg width="12px" height="12px" class="mr-1"><use xlink:href="#icon-visit-repo"/></svg>
                Visit repo
            </a>
        </div>
    </div>
</div>
