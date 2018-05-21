#!/bin/bash

function heading  {
    echo $(tput bold)$(tput setaf 1)$@ $(tput sgr 0)
}

function bold {
    echo $(tput bold)$(tput setaf 4)$@ $(tput sgr 0)
}

function slugify {
    echo "$1" | iconv -t ascii//TRANSLIT | sed -E s/[^a-zA-Z0-9]+/-/g | sed -E s/^-+\|-+$//g | tr A-Z a-z
}

# -------------------------------

echo
heading "Creating a new article."

echo
bold "What is the title?"
read title

echo
bold "What is the author's name?"
read author

echo
bold "What is the URL?"
read url

echo
bold "What is the date published, in YYYY-MM-DD form?"
read published

slug=`slugify "$title"`

# -------------------------------

buildpath="$PWD/source/_articles/$slug.md"
echo
bold "Creating a file at:"
echo $buildpath

touch $buildpath

cat <<EOT >> $buildpath
---
title: "$title"
author: $author
url: $url
published: $published
---
EOT

vim $buildpath
