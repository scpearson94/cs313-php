-- Creates a new table and define a primary key
CREATE TABLE scriptures (
    scripture_id  INT GENERATED ALWAYS AS IDENTITY,
    scripture_book   VARCHAR(40) NOT NULL,
    scripture_chapter   SMALLINT NOT NULL,
    scripture_verse   SMALLINT NOT NULL,
    scripture_content   TEXT NOT NULL,
    PRIMARY KEY (scripture_id),
    CHECK (scripture_chapter > 0),
    CHECK (scripture_verse > 0)
);


INSERT INTO scriptures (scripture_book, scripture_chapter, scripture_verse, scripture_content)
VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.'),
('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'),
('Doctrine and Covenants', 93, 28, 'Man was also in the beginning with God. Intelligence, or the light of truth, was not created or made, neither indeed can be.'),
('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');
