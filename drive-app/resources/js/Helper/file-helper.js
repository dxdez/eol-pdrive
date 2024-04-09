export function isImage(file) {
    return /^image\/\w+$/.test(file.mime)
}

