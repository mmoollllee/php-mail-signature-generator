# PHP Mail Signature Generate

> To be hosted on your companies webserver to support every employee with generating its emailsignature for Apple Mail, iOS, Thunderbird, Microsoft Outlook and every other Mail-Client that supports HTML-Signatures.

[Demo](https://signatur-demo.moritz-graf.de/)

Username / Password: `demo`

## How To Use

1. Upload this repo to your webserver. e.g. `example.com/signature`
2. Edit .htaccess and .htpasswd or secure the path with with other techniques.
3. Edit `config.php`
4. Place files to be selected as Banner in the public directory defined in `$files`
5. Set Up your HTML Signature Template with inline css. Test it in different mail clients.
6. Hate Mail Clients for their HTML & CSS support
7. Send every employer, in need of a mail signature, the link and credentials to the generator.
8. Show me how your mail signature looks! I'm happy to see working examples for beautiful mail signatures.
