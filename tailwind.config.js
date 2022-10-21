module.exports = {
    content: require('fast-glob').sync(['source/**/*.{blade.php,blade.md,md,html,vue}', '!source/**/_tmp/*'], {
        dot: true,
    }),
    theme: {
        container: {
            padding: '2rem',
        },
    },
};
