import numpy as np
from numpy.linalg import inv
import tkinter as tk

alphabet = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з',
            'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р',
            'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ',
            'ъ', 'ы', 'ь', 'э', 'ю', 'я', 'А', 'Б', 'В',
            'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К',
            'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У',
            'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь',
            'Э', 'Ю', 'Я', ' ', '.', ':', '!', '?', ',']

# Функция для создания матрицы из текста
def createMatrix(text):
    matrix = []
    for i in range(0, len(text), len(keyMatrix)):
        column = [get_Index(symbol) for symbol in text[i:i + len(keyMatrix)]]
        column += [67] * (len(keyMatrix) - len(column))
        matrix.append(column)
    return matrix


def encrypt_decrypt():
    input_text = input_entry.get()

    # Шифруем введенный текст с использованием матрицы ключа
    #Умножаем матрицу с веденным текстом на ключ матрицу
    encrypted_text = Multiply(createMatrix(input_text), keyMatrix)

    # Выводим зашифрованный текст
    encrypted_label.config(text="Зашифрованная строка: " + ' '.join(map(str, encrypted_text.flat)))

    # Дешифруем текст с использованием обратной матрицы ключа (инвентированная матрица для зашифровки)
    result_text = Multiply(encrypted_text, cipher_key_inv)

    # Преобразуем числа в символы алфавита
    decrypted_text = ''.join(alphabet[round(num) - 1] for num in result_text.flat)

    #ВЫводим расшифрованный текст
    decrypted_label.config(text="Расшифрованная строка: " + decrypted_text)

# Матрица ключа для шифрования
keyMatrix = np.array([[1, 3, 2],
                      [2, 1, 5],
                      [3, 2, 1]])

# Вычисляем обратную матрицу ключа
try:
    cipher_key_inv = inv(keyMatrix)
except np.linalg.LinAlgError:
    # Если определитель ключа равен 0
    print("Ошибка. Определитель ключа равен 0.")
    exit()

# Функция для получения индекса символа в алфавите
def get_Index(symbol):
    return alphabet.index(symbol) + 1 if symbol in alphabet else 0

# Функция для умножения матриц
def Multiply(matrix_text, matrix_key):
    return np.dot(matrix_text, matrix_key)

window = tk.Tk()
window.title("Шифрование и дешифрование")

input_label = tk.Label(window, text="Введите строку для шифрования:", font=("Arial", 14))
input_label.pack()

input_entry = tk.Entry(window, font=("Arial", 14))
input_entry.pack()

encrypt_button = tk.Button(window, text="Зашифровать", command=encrypt_decrypt, font=("Arial", 14))
encrypt_button.pack()

encrypted_label = tk.Label(window, text="Зашифрованная строка:", font=("Arial", 14))
encrypted_label.pack()

decrypted_label = tk.Label(window, text="Расшифрованная строка: ", font=("Arial", 14))
decrypted_label.pack()

window.geometry("630x300+700+350")
window.mainloop()