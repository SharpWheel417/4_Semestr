from tkinter import *
from tkinter import messagebox
 

Vigenere = ["а","б","в","г","д","е","ё","ж","з","и","й","к","л","м","н","о","п","р","с","т","у","ф","х","ц","ч","ш","щ","ъ","ы","ь","э","ю","я","А","Б","В","Г","Д","Е","Ё","Ж","З","И","Й","К","Л","М","Н","О","П","Р","С","Т","У","Ф","Х","Ц","Ч","Ш","Щ","Ъ","Ы","Ь","Э","Ю","Я"," ",".",":","!","?",","]
  

def to_alphabet(message):
    result_message = []
    for ltr in range(len(message)):
        for num in range (len(Vigenere)):
            if (message[ltr]==Vigenere[num]):
                result_message.append(num)
    return result_message
 
def from_alphabet(message):
    for ltr in range(len(message)):
        for num in range (len(Vigenere)):
            if message[ltr]==num:
                message[ltr]=Vigenere[num]
    return message

##Шифровщик
def incryption():
    
   result_message = []

   ##ПОлучаем сообщение и ключ
   message = str(message_en.get())
   key = str(key_en.get())

   ##Переводим в алфавит
   message = to_alphabet(message)
   key = to_alphabet(key)

   ##Шифруем
   for i in range(len(message)):
       result_message.append((message[i] + (key[i%len(key)]+1)) % len(Vigenere))

   ##Переводим обратно
   result_message = from_alphabet(result_message)

   ##Выводим результат
   result = ''.join(result_message)

   answer_lb = Label(
   frame,
   text="Зашифрованный текст: "+result
   )
   answer_lb.grid(row=7, column=1)

##Расшифровщик
def decryption():

   result_message = []

   #Получаем шифр и ключ из инпутов
   message = str(shifr_en.get())
   key = str(key_en.get())

   #Переводим в алфавит
   message = to_alphabet(message)
   key = to_alphabet(key)

   #Расшифровываем
   for i in range(len(message)):
      result_message.append((message[i] - (key[i%len(key)]+1)) % len(Vigenere))

   #Переводим обратно
   result_message = from_alphabet(result_message)
   result = ''.join(result_message)

   answer_lb = Label(
   frame,
   text="Расшифрованный текст: "+result
   )
   answer_lb.grid(row=9, column=1)


window = Tk()
window.title('Шифровщик сообщений ПОлибушка')
window.geometry('400x300')
 
 
frame = Frame(
   window,
   padx=10,
   pady=10
)
frame.pack(expand=True)
 
 
mess_lb = Label(
   frame,
   text="Введите сообщение"
)
mess_lb.grid(row=3, column=1)

key_lb = Label(
   frame,
   text="Введите ключ"
)
key_lb.grid(row=4, column=1)
 
 
message_en = Entry(
   frame,
)
message_en.grid(row=3, column=2, pady=5)

key_en = Entry(
   frame,
)
key_en.grid(row=4, column=2, pady=5)

shifr_lb = Label(
   frame,
   text="Введите зашифрованное сообщение:",
)
shifr_lb.grid(row=5, column=1)


shifr_en = Entry(
   frame,
)
shifr_en.grid(row=5, column=2, pady=5)

cal_btn = Button(
   frame,
   text='Зашифровать сообщение',
   command=incryption
)
cal_btn.grid(row=6, column=2)

cal_btn = Button(
   frame,
   text='Расшифровать сообщение',
   command=decryption
)
cal_btn.grid(row=6, column=3)
 
window.mainloop()