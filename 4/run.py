import tkinter as tk
from tkinter import messagebox
import random
import sympy

def generate_keypair():
    # Генерация  чисел p и q
    #Генерирует просто число, которое делится на себя и единицу
    
    p = sympy.randprime(50, 100)
    q = sympy.randprime(100, 150)

    # Вычисление n и функции Эйлера (φ)
    n = p * q
    phi = (p - 1) * (q - 1)  #фи

    # Выбор открытого ключа e (1 < phi)
    e = random.randrange(1, phi)

    # Проверка взаимной простоты e и φ
    while sympy.gcd(e, phi) != 1:
        e = random.randrange(1, phi)

    # Вычисление закрытого ключа d как обратное значение для e по модулю phi
    d = sympy.mod_inverse(e, phi)

    # Получаем открытый и закрытый ключ
    return ((e, n), (d, n))

def encrypt(public_key, plaintext):
    e, n = public_key # извлечение открытого ключа
    # Шифрование каждого символа в сообщении
    cipher_text = [pow(ord(char), e, n) for char in plaintext]
    return cipher_text

def decrypt(private_key, cipher_text):
    d, n = private_key # извлечение   закрытого ключа
    # Расшифровка каждого числа в зашифрованном сообщении
    decrypted_text = [chr(pow(char, d, n)) for char in cipher_text]
    return ''.join(decrypted_text)

def show_public_key():
    messagebox.showinfo("Открытый ключ", f"Открытый ключ:\n{public_key}")

def encrypt_button_click():
    message = entry_message.get()
    cipher_text = encrypt(public_key, message)

    # Копирование зашифрованного сообщения в буфер обмена
    root.clipboard_clear()
    root.clipboard_append(str(cipher_text))
    root.update()

    messagebox.showinfo("Зашифрованное сообщение", f"Зашифрованное сообщение:\n{cipher_text}")

def decrypt_button_click():
    cipher_text = entry_cipher.get()
    try:
        cipher_text_list = eval(cipher_text)
        decrypted_text = decrypt(private_key, cipher_text_list)
        messagebox.showinfo("Расшифрованное сообщение", decrypted_text)
    except Exception as e:
        messagebox.showerror("Ошибка", f"Ошибка при расшифровке: {str(e)}")

# Генерация ключей
public_key, private_key = generate_keypair()

# Создание главного окна
root = tk.Tk()
root.title("RSA Шифрование")
font_size = 14
# Кнопка для отображения открытого ключа
show_key_button = tk.Button(root, text="Показать открытый ключ", command=show_public_key, font=("Arial", font_size))
show_key_button.pack()

# Ввод сообщения
label_message = tk.Label(root, text="Введите сообщение:", font=("Arial", font_size))
label_message.pack()
entry_message = tk.Entry(root, font=("Arial", font_size))
entry_message.pack()

# Кнопка для шифрования
encrypt_button = tk.Button(root, text="Зашифровать", command=encrypt_button_click, font=("Arial", font_size))
encrypt_button.pack()

# Ввод зашифрованного текста
label_cipher = tk.Label(root, text="Введите зашифрованный текст:", font=("Arial", font_size))
label_cipher.pack()
entry_cipher = tk.Entry(root, font=("Arial", font_size))
entry_cipher.pack()

# Кнопка для расшифрования
decrypt_button = tk.Button(root, text="Расшифровать", command=decrypt_button_click, font=("Arial", font_size))
decrypt_button.pack()

root.geometry("400x300+700+350")
root.mainloop()
