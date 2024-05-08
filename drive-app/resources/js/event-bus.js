import mitt from 'mitt'

export const FILE_UPLOAD_STARTED = 'FILE_UPLOAD_STARTED'
export const SHOW_ERROR_DIALOG = 'SHOW_ERROR_DIALOG'

export function showErrorDialog(message) {
    emitter.emit(SHOW_ERROR_DIALOG, {message})
}

export const emitter = mitt()
