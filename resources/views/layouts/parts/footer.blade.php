<!-- make a footer -->
<footer class="bg-white text-primary shadow-md flex flex-col p-4">
    <div class="flex justify-around text-white">
        <div class="grayscale w-fit">
            @include('layouts.parts.logo')
        </div>
        <div class="flex flex-col md:flex-row items-centerjustify-between gap-4">
            <div class="flex flex-col gap-2">
                <h3 class="text-lg text-primary font-serif font-semibold">Kontakt</h3>
                <!-- table contact -->
                <table class="table-auto w-64">
                    <tr>
                        <td class="text-primary">Telefon</td>
                        <td>+49 2501 801-1730</td>
                    </tr>
                    <tr>
                        <td class="text-primary">Email</td>
                        <td>
                            <a href="mailto:plk@lv.de">
                                plk@lv.de
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="text-lg text-primary font-serif font-semibold">Adresse</h3>
                <!-- table address -->
                <table class="table-auto w-64">
                    <tr>
                        <td class="text-primary">Adresse</td>
                        <td>Am Sportplatz 1</td>
                    </tr>
                    <tr>
                        <td class="text-primary">Ort</td>
                        <td>12345 Musterstadt</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <hr class="mt-6" />
    <div class="mx-auto uppercase text-xs font-extrabold mt-10 space-x-2">
        <!-- impressum -->
        <a href="/#" class="hover:underline">Impressum</a>
        <span>|</span>
        <!-- datenschutz -->
        <a href="/#" class="hover:underline">Datenschutz</a>
    </div>
</footer>
