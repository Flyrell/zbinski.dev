<script>
    const icons = [
        {
            src: 'icons/github-brands.svg',
            alt: 'My Github profile',
            classname: 'icon--github',
            href: 'https://github.com/Flyrell'
        },
        {
            src: 'icons/npm-brands.svg',
            alt: 'My npm packages',
            className: 'icon--npm',
            href: 'https://www.npmjs.com/~flyrell'
        },
        {
            src: 'icons/linkedin-in-brands.svg',
            alt: 'My LinkedIn Profile',
            className: 'icon--linkedin',
            href: 'https://linkedin.com/in/dawidzbinski/'
        },
        {
            src: 'icons/facebook-brands.svg',
            alt: 'My Facebook Profile',
            className: 'icon--facebook',
            href: 'https://www.facebook.com/dawid.zbinski'
        },
        {
            src: 'icons/file-pdf.svg',
            alt: 'My CV',
            className: 'icon--cv',
            href: 'assets/CV.pdf'
        }
    ];
    const getFullImageSrc = (src) => 'assets/images/' + src;

</script>

<style>
.icons {
    top: 50%;
    left: 50%;
    display: flex;
    position: absolute;
    align-items: center;
    justify-content: space-between;
    transform: translate(-50%,-50%);
}
.icon {
    width: 50px;
    height: 50px;
    margin: 0 15px;
    transform: translateY(0);
    filter: drop-shadow(5px 5px 5px #1A1A1AAA);
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
