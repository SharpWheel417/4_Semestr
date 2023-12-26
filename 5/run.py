import math
import tkinter as tk

# Инициализация констант
K = [int(abs(math.sin(i+1)) * 2**32) & 0xFFFFFFFF for i in range(64)]
s = [
    7, 12, 17, 22,
    5, 9, 14, 20,
    4, 11, 16, 23,
    6, 10, 15, 21,
    7, 12, 17, 22,
    5, 9, 14, 20,
    4, 11, 16, 23,
    6, 10, 15, 21,
    7, 12, 17, 22,
    5, 9, 14, 20,
    4, 11, 16, 23,
    6, 10, 15, 21,
    7, 12, 17, 22,
    5, 9, 14, 20,
    4, 11, 16, 23,
    6, 10, 15, 21
]

# Функции для преобразования байтов и слов
def bytes_to_words(byte_array):
    return [int.from_bytes(byte_array[i:i+4], byteorder='little') for i in range(0, len(byte_array), 4)]

def words_to_bytes(word_array):
    return b''.join([word.to_bytes(4, byteorder='little') for word in word_array])

# Вспомогательные функции
def left_rotate(x, n):
    return ((x << n) | (x >> (32 - n))) & 0xFFFFFFFF

# Основная функция хэширования MD5
def md5_hash():
    message = input_entry.get()
    message = bytes(message, 'utf-8')
    # Инициализация переменных
    A = 0x67452301
    B = 0xEFCDAB89
    C = 0x98BADCFE
    D = 0x10325476

    # Предварительная обработка сообщения
    original_length = len(message)
    message += b'\x80'
    while (len(message) % 64) != 56:
        message += b'\x00'

    message += original_length.to_bytes(8, byteorder='little')

    # Разбивка сообщения на блоки
    blocks = [message[i:i+64] for i in range(0, len(message), 64)]

    # Цикл обработки блоков
    for block in blocks:
        words = bytes_to_words(block)

        # Инициализация хэшей текущего блока
        a = A
        b = B
        c = C
        d = D

        # Основные операции хэширования
        for i in range(64):
            if i < 16:
                f = (b & c) | ((~b) & d)
                g = i
            elif i < 32:
                f = (d & b) | ((~d) & c)
                g = (5*i + 1) % 16
            elif i < 48:
                f = b ^ c ^ d
                g = (3*i + 5) % 16
            else:
                f = c ^ (b | (~d))
                g = (7*i) % 16

            f = (f + a + K[i] + words[g]) & 0xFFFFFFFF
            a = d
            d = c
            c = b
            b = (b + left_rotate(f, s[i])) & 0xFFFFFFFF

        # Обновление хэшей
        A = (A + a) & 0xFFFFFFFF
        B = (B + b) & 0xFFFFFFFF
        C = (C + c) & 0xFFFFFFFF
        D = (D + d) & 0xFFFFFFFF

    # Формирование финального хэша
    final_hash = words_to_bytes([A, B, C, D])

    encrypted_label.config(text="Хэш: " + final_hash.hex())



window = tk.Tk()
window.title("MD5 ")

input_label = tk.Label(window, text="Введите строку для шифрования:", font=("Arial", 14))
input_label.pack()

input_entry = tk.Entry(window, font=("Arial", 14))
input_entry.pack()

encrypt_button = tk.Button(window, text="Зашифровать", command=md5_hash, font=("Arial", 14))
encrypt_button.pack()

encrypted_label = tk.Label(window, text="Хэш строки:", font=("Arial", 14))
encrypted_label.pack()

window.geometry("630x300+700+350")
window.mainloop()

