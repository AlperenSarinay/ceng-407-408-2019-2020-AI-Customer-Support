#!/usr/bin/env python
import sys
import pandas as pd
import nltk
from nltk.corpus import stopwords 

data = pd.read_csv("data.csv")

nltk.download('punkt')

import string

from sklearn.feature_extraction.text import TfidfVectorizer

stemmer = nltk.stem.porter.PorterStemmer()
remove_punctuation_map = dict((ord(char), None) for char in string.punctuation)

def stem_tokens(tokens):
    return [stemmer.stem(item) for item in tokens]

'''remove punctuation, lowercase, stem'''
def normalize(text):
    return stem_tokens(nltk.word_tokenize(text.lower().translate(remove_punctuation_map)))

vectorizer = TfidfVectorizer(tokenizer=normalize, stop_words='english')

def cosine_sim(text1, text2):
    tfidf = vectorizer.fit_transform([text1, text2])
    return ((tfidf * tfidf.T).A)[0,1]

text = ''
for word in sys.argv[1:]:
    text += word + ' '

update_df = pd.DataFrame(columns=['index' ,'text', 'similarity'])

indexes = []
texts = []
similarities = []

index = -1
for i in data.question.values:
  index += 1
  sim = cosine_sim(i ,text )
  indexes.append(index)
  texts.append(i)
  similarities.append(sim)


update_df['index'] = indexes
update_df['text'] = texts
update_df['similarity'] = similarities

update_df.sort_values(by = 'similarity',ascending=False , inplace=True)
print(update_df.head())