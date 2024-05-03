from dotenv import load_dotenv, dotenv_values
import os
from openai import OpenAI

load_dotenv()



client = OpenAI(
    # This is the default and can be omitted
    api_key=os.getenv("OPEN_AI_KEY"),
)

def chat(prompt):
    response = client.chat.completions.create(
        model = "gpt-3.5-turbo",
        messages = [{"role" : "user","content" :prompt}]
    )

    return response.choices[0].message.content.strip()



if __name__ == "__main__":

    while True:
        user_input = input ("you :")
        if user_input.lower() in ["quit",["close"]]:
            break

        response = chat(user_input)
        print ("chatGPT :", os.getenv("OPEN_AI_KEY"))