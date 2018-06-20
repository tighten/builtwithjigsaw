<div class="flex m-2 shadow hover:shadow-md" style="width: 380px;">
    <div class="flex-1">
        <a :href="site.url" class="block"><img :src="site.image" alt="Web site screenshot" class="border block"></a>
        <div class="text-sm py-4 px-6 bg-white">
            <a :href="site.url" class="no-underline text-grey-darkest mb-1 block">{| site.title |}</a>
            <div class="mb-4 text-grey-dark">by {| site.authors.join(', ') |}</div>
            <div class="mb-2">
                <span v-for="type in site.types" class="bg-green text-xs text-white py-1 px-2 inline-block rounded mr-2" :style="{ background: colors.type }">{| _.startCase(type) |}</span>
            </div>
        </div>
        <div class="bg-white flex text-sm border-t">
            <a :href="site.url" class="p-4 flex-1 text-center p-4 no-underline text-blue hover:bg-blue hover:text-white"><svg width="12px" height="12px" class="mr-1"><use xlink:href="#icon-visit-website"/></svg> Visit website</a>
            <a v-if="site.repo" :href="site.repo" class="p-4 flex-1 text-center p-4 no-underline text-blue hover:bg-blue hover:text-white"><svg width="12px" height="12px" class="mr-1"><use xlink:href="#icon-visit-repo"/></svg> Visit repo</a>
        </div>
    </div>
</div>
