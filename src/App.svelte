<script>
    const icons = [
        {
            src: 'icons/github-brands.svg',
            alt: 'flyrell on Github',
            classname: 'icon--github',
            href: 'https://github.com/Flyrell'
        },
        {
            src: 'icons/npm-brands.svg',
            alt: 'flyrell\'s packages on npm',
            className: 'icon--npm',
            href: 'https://www.npmjs.com/~flyrell'
        },
        {
            src: 'icons/linkedin-in-brands.svg',
            alt: 'Dawid Zbiński on LinkedIn',
            className: 'icon--linkedin',
            href: 'https://linkedin.com/in/dawidzbinski/'
        },
        {
            src: 'icons/facebook-brands.svg',
            alt: 'Dawid Zbiński on Facebook',
            className: 'icon--facebook',
            href: 'https://www.facebook.com/dawid.zbinski'
        },
    ];
    const getFullImageSrc = (src) => '/assets/images/' + src;

</script>

<style>
.icons {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.icon {
    width: 50px;
    height: 50px;
    filter: drop-shadow(5px 5px 5px #1A1A1AAA);
    margin: 0 15px;
    transform: translateY(0);
    transition: transform .15s ease-in-out, filter .15s ease-in;
}
.icon:hover {
    transform: translateY(3px);
    filter: drop-shadow(3px 2px 3px #1A1A1AAA);
}
.icon--linkedin {
    width: 44px;
    height: 44px;
}
</style>

<main class="icons">
    {#each icons as icon}
        <a href={icon.href} target="_blank" rel="noreferrer">
            <img class="icon {icon.className}" alt={icon.alt} src={getFullImageSrc(icon.src)}>
         </a>
    {/each}
</main>


<svelte:head>
</svelte:head>
